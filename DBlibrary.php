<?php
    class DBlibrary {
        private $conn;
        function __construct() {
            include 'DBconnect.php';
            $db = new DBconnect();
            $this->conn=$db->connect();
        }
    
        public function selectState()
        {
            $stmt = "select state_name from state";
            $result=mysqli_query($this->conn,$stmt);
            return $result;
        }

        public function registerUser($first_name,$middle_name,$last_name,$user_id,$password,$district,$state,$postal_code,$email,$phone,$dob,$gender,$hobby,$department,$designation,$start_year,$end_year,$img,$status,$otp){ $stmt="select user_id from user where user_id='$user_id'";
        $result=mysqli_query($this->conn,$stmt);
        $num_rows=mysqli_num_rows($result);
        if($num_rows!=0){
            return 2;
        }
        else
        {
            $password=md5($password);
            $stmt="insert into user(first_name,middle_name,last_name,user_id,password,gender,hobby,district,state,postal_code,phone_number,email_address,dob,department,designation,start_year,end_year,profile_picture,status)values('$first_name','$middle_name','$last_name','$user_id','$password','$gender','$hobby','$district','$state','$postal_code','$phone','$email','$dob','$department','$designation','$start_year','$end_year','$img','$status')";
            $result=mysqli_query($this->conn,$stmt);
            if($result)
            {
                $stmt="delete from otp where user_id='$user_id'";
                $result=mysqli_query($this->conn,$stmt);
                $stmt="insert into otp(user_id,code)values('$user_id','$otp')";
                $result=mysqli_query($this->conn,$stmt);
                if($result)
                { 
                    return 0; //success
                }
                else
                {
                    return 1; //error
                }
            }
        }  
    }
        
        public function loginUser($user_id,$password)
        {
            $password=md5($password);
            $stmt="select * from user where user_id='$user_id' and password='$password'";
            $result=mysqli_query($this->conn,$stmt);
            $num_rows=mysqli_num_rows($result);
            if($num_rows==0){
                return 0; //Failure
            }   
            else{
                return 1; //Success
            }
        }
        
        public function activateUser($otp){
            $stmt="select otp.user_id from user, otp where otp.code='$otp' and otp.user_id=user.user_id";
            $result=mysqli_query($this->conn,$stmt);
            $row=mysqli_fetch_array($result);
            $num_rows=mysqli_num_rows($result);
            if ($num_rows!=0)
            {
                $user_id=$row['user_id'];
                $stmt="update user set status='active' where user_id='$user_id'";
                $result=mysqli_query($this->conn,$stmt);
                return 1;
            }
            else{
                return 0;
            }
        } 
    
        public function resendOtp($user_id){
            $stmt="select otp.code from user, otp where user.user_id = otp.user_id and user.user_id = '$user_id'";
            $result=mysqli_query($this->conn,$stmt);
            $row=mysqli_fetch_array($result);
            $otp=$row['code'];
            return $otp;
        }
    
        public function getUserDetailHome($user_id){
            $stmt="select first_name, middle_name, last_name, gender, hobby, postal_code, phone_number, dob, department, start_year, end_year, profile_picture, designation, email_address, district, state  from user where user_id='$user_id'";
            $result=mysqli_query($this->conn,$stmt);
            $row=mysqli_fetch_array($result);
            return $row;
        }
        
        public function getPost(){
            $stmt="select user.user_id, user.first_name, user.middle_name, user.last_name, user.designation, user.profile_picture, post.post_id, post.post_desc, post.attachment_photo, post.attachment_video, post.attachment_file, post_dept, post.post_date_time from user, post where user.user_id=post.user_id order by post_date_time desc";
            $row_post=mysqli_query($this->conn,$stmt);
            return $row_post;
        }
        
        public function myPost($user_id){
            $stmt="select user.user_id, user.first_name, user.middle_name, user.last_name, user.designation, user.profile_picture, post.post_id, post.post_desc, post.attachment_photo, post.attachment_video, post.attachment_file, post.post_dept, post.post_date_time from user, post where user.user_id=post.user_id and user.user_id='$user_id' order by post_date_time desc";
            $row_mypost=mysqli_query($this->conn,$stmt);
            return $row_mypost;
        }
    
        public function groupMember(){
            $stmt="select user_id, first_name, middle_name, last_name, profile_picture from user";
            $member=mysqli_query($this->conn,$stmt);
            return $member;
        }
        
        public function userName($user_id){
            $stmt="select first_name from user where user_id='$user_id'";
            $result=mysqli_query($this->conn,$stmt);
            $user=mysqli_fetch_array($result);
            return $user;
        }
        
        public function comment($post_id){
            $stmt="SELECT comment_user_id, first_name, middle_name, last_name, comment_desc, cmnt_date_time FROM comment WHERE post_id='$post_id' ORDER BY cmnt_date_time desc";
            $cmnt=mysqli_query($this->conn,$stmt);
            return $cmnt;
        }
        
        public function countComment($post_id){
            $stmt="SELECT COUNT(*) AS count_comment FROM comment WHERE post_id='$post_id'";
            $result=mysqli_query($this->conn, $stmt);
            $count=mysqli_fetch_array($result);
            return $count;
        }
        
        public function getImage($comment_user_id){
            $stmt="select profile_picture from user where user_id='$comment_user_id'";
            $result=mysqli_query($this->conn, $stmt);
            $image=mysqli_fetch_array($result);
            return $image;
        }
        
        public function insertComment($post_id, $user, $first_name, $middle_name, $last_name, $comm){
            $stmt="insert into comment(post_id, comment_user_id, first_name, middle_name, last_name, comment_desc)values('$post_id','$user','$first_name','$middle_name','$last_name','$comm')";
            $comment=mysqli_query($this->conn, $stmt);
            return $comment;
        }
        
        public function postUpload($user_id, $text_post, $img, $vid, $attch, $deptfilter, $status){
            $stmt="insert into post(user_id, post_desc, attachment_photo, attachment_video, attachment_file, post_dept, status)values('$user_id','$text_post','$img','$vid','$attch','$deptfilter','$status')";
            $result=mysqli_query($this->conn, $stmt);
            return $result;
        }
        
        public function deletePost($post_id){
            $stmt="delete from post where post_id='$post_id'";
            $delpost=mysqli_query($this->conn, $stmt);
            return $delpost;
        }
    }
?>