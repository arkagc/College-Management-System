<?php
$server="localhost";
$user="root";
$pwd="";
$dbname="college_campus";
$conn=new mysqli($server,$user,$pwd,$dbname);
$post_id=$_POST['post_id'];
$user_id=$_POST['user_id'];
$stmt="INSERT INTO user_like (post_id,user_id,flag) VALUES ('$post_id','$user_id',1) ";
$result=mysqli_query($conn, $stmt);
if($result){
    $stmt2="select count(*) as like_count from user_like where post_id='$post_id'";
    $result2=mysqli_query($conn,$stmt2);
    $row_count=mysqli_fetch_array($result2);
    $count_like=$row_count['like_count'];
    echo $count_like;
}
else{
    "Error Clicking on Like Button !";
}
?>