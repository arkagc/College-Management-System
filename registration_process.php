<?php
    include 'DBlibrary.php';
    $db = new DBlibrary();
    
    $first_name=ucfirst(strtolower($_POST["fname"]));
    //$first_name=ucfirst($first_name);

    $middle_name=ucfirst(strtolower($_POST["mname"]));
    //$middle_name=ucfirst($middle_name);

    $last_name=ucfirst(strtolower($_POST["lname"]));
    //$last_name=ucfirst($last_name);

    $user_id=strtoupper($_POST["usid"]);
    //$user_id=strtoupper($_POST["empid"]);
    $password=$_POST["password"];

    $district=ucfirst(strtolower($_POST["addr"]));
    //$district=ucfirst($district);

    $state=$_POST["state"];
    //$state=strtoupper($state);

    $postal_code=$_POST["zip"];
    $email=strtolower($_POST["mail"]);
    $phone=$_POST["ph_no"];
    $dob=$_POST["dob"];
    $gender=$_POST["gender"];
    $hobby=strtolower($_POST["hob"]);
    //$hobby=strtolower($hobby);
    
    $department=$_POST["dept"];
    $designation=$_POST["desg"];
    $start_year=$_POST["start_year"];
    $end_year=$_POST["end_year1"];
    $img="";
    $status="inactive";
    $otp=rand(100000,999999);

    $allowedexts=array("jpg","gif","bmp","ani","cal","fax","img","jbg","jpe","jpeg","mac","pbm","pcd","pcx","pct","pgm","png","ppm","psd","ras","tga","tiff","wmf");
    $temp=explode(".",$_FILES["file"]["name"]);
    $extension=end($temp);
    if($extension!=""){
        if(in_array($extension,$allowedexts) && ($_FILES["file"]["size"]<8388608))
    {
        if($_FILES["file"]["error"]>0)
        {
        //echo "Return Code: ".$_FILES["file"]["error"];
            echo "Error uploading photo";
        }
   
        else
        {
            //$target_dir="upload/";
            //$target_file=$target_dir.basename($_FILES["file"]["name"]);
            //$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            //$target_file=$target_dir.$user_id.time().".".$imageFileType;
            
            $newfilename = 'profile_photo'.'_'.$user_id.'_'.round(microtime(true)) . '.' . $extension;
            $img = 'profile_photo'.'_'.$user_id.'_'.round(microtime(true)) . '.' . $extension;
            move_uploaded_file($_FILES["file"]["tmp_name"],"profilephoto/".$newfilename);
            //$img="upload/".$_FILES["file"]["name"];
            //$img = $user_id.'_'.round(microtime(true)) . '.' . $extension;
            
            
            
        }
    }
    
    else
    {
        echo "Sorry! Invalid File";
    }
    }

 //$db->registerUser($first_name,$middle_name,$last_name,$user_id,$password,$district,$state,$postal_code,$email,$phone,$dob,$gender,$hobby,$department,$designation,$start_year,$end_year,$img,$status,$otp);

    $res=$db->registerUser($first_name,$middle_name,$last_name,$user_id,$password,$district,$state,$postal_code,$email,$phone,$dob,$gender,$hobby,$department,$designation,$start_year,$end_year,$img,$status,$otp);
    
    if($res=="0"){
        sendSms($phone,$otp, $first_name, $middle_name, $last_name);
        header("Location:otp.php?user_id=$user_id&phone=$phone");
    }
    elseif($res=="1"){
        $response["message"]="Sorry! Error occurred in registration";
        echo "<script> alert('Sorry! Error occurred in registration');</script>";
    }
    else{
        echo "<script> alert('Sorry! User already exist!'); 
        window.location='registration.php'</script>";
        //header('Location:registration.php');
    }


function sendSms($phone, $otp, $first_name, $middle_name, $last_name) {
     
    //$otp_prefix = ':';
 
    //Your message to send, Add URL encoding here.
    $message = urlencode("Hello! $first_name $middle_name $last_name 
    Welcome to College Campus, 
    Your OTP is : $otp 
    ~Thank You");
 
    $response_type = 'json';
 
    //Define route 
    $route = "4";
    //$MSG91_AUTH_KEY="180706AmGQpE6NW59f06fed";
    //API SANTANU ROY
    $MSG91_AUTH_KEY="204451A8TreDUv6Lm5aafb222";
	$MSG91_SENDER_ID="Campus";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $MSG91_AUTH_KEY,
        'mobiles' => $phone,
        'message' => $message,
        'sender' => $MSG91_SENDER_ID,
        'route' => $route,
        'response' => $response_type
    );
 
//API URL
   // $url = "https://control.msg91.com/sendhttp.php";
	$url= "http://api.msg91.com/api/sendhttp.php";
 
// init the resource

   $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
    ));
 
 
    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 
 
    //get response
    $output = curl_exec($ch);
 
    //Print error if any
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }
 
    curl_close($ch);

}
        


//header('Location:otp.php');
?>