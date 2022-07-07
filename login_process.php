<?php
session_start();
$user_id=$_POST["user_id"];
$password=$_POST["password"];

include 'DBlibrary.php';
$db = new DBlibrary();
$user=$db->userName($user_id);
//echo $user['first_name'];
//die;
//session_start();
//$user_id=$_POST["user_id"];
//$password=$_POST["password"];


$res=$db->loginUser($user_id,$password);
if($res==0){
    $msg="Sorry! Invalid Login Credential";
    header('Location:login.php?msg='.$msg);
   // echo "<script>alert('Sorry! Invalid Login Credential!'); window.location='login.php'</script>";
}
else{
    $_SESSION['user_id']=$user_id;
    $_SESSION['first_name']=$user['first_name'];
    $image=$db->getImage($user_id);
    $profilephoto=$image['profile_picture'];
    $_SESSION['profile_picture']=$profilephoto;
    header('Location:home_main.php');

}
?>