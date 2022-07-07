<?php
    include 'DBlibrary.php';
    $db = new DBlibrary();

    $response=array();
    $response["error"]=false;
    $otp=$_POST['otp'];
    $user=$db->activateUser($otp);
    if($user==1){
        /*echo "<script>alert('Registration completed successfully!'); window.location='thank_you_registration.php';</script>";*/
        header('Location:thank_you_registration.php');
    }
    else{
        echo "Sorry! Failed to create your account!";
    } 
?>