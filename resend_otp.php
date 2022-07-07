<?php
    include 'DBlibrary.php';
    $db = new DBlibrary();
    
    $user_id=$_REQUEST['user_id'];
    $phone=$_REQUEST['phone'];
    
    $otp=$db->resendOtp($user_id, $phone);
    //Your message to send, Add URL encoding here.
    $message = urlencode("Hello! 
    Welcome to College Campus, 
    Your OTP is : $otp 
    ~Thank You");
    $response_type = 'json';
    //Define route 
    $route = "4";
    //$MSG91_AUTH_KEY="180706AmGQpE6NW59f06fed";
//API SANTANU ROY
    // $MSG91_AUTH_KEY="204451A8TreDUv6Lm5aafb222"
//API ARKA 
    $MSG91_AUTH_KEY="216484A6iCPLaqpc5b02f7d3";
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
    header("Location:otp.php?user_id=$user_id&phone=$phone");
?>