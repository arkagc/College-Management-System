<?php
$user_id=$_GET['user_id'];
$phone=$_GET['phone'];
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="icon" href="images/favicon.ico">
    <title>OTP Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style type="text/css">
        #background{
        background:url("images/bg3.jpg");
        width: 100%;
        }
        button:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }
    </style>
    <script>
    // Hiding Default Context Menu
    document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</head>
    
<body id="background">
    <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" 
         style="background-color:rgb(51,51,51); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.3);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" 
                   href="index.php" 
                   style="font-size: 20px; 
                          color:rgb(255,255,255)">CCampus</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a style="font-size: 20px;" href="about_us.php">About Us</a></li>
                <li><a style="font-size: 20px;" href="contact_us.php">Contact Us</a></li>
                <li><a style="font-size: 20px;" href="help.php">Help</a></li>
            </ul>
        </div>
    </nav>
    
        <div class="col-lg-3"></div>
        
        <div class="col-lg-6 well" 
             style="background-color:rgba(224,224,235,0.6); 
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
                    margin-top:80px;">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <br>
                    <img src="images/otp.png" 
                         class="img-responsive" 
                         style="width:200px; 
                                height:200px;margin:0 auto;"><br>
                    <h1 class="text-center">Verify your mobile number</h1><br>
                    <h4 class="text-center">This extra step shows its really you trying to register</h4><br>
                    <!--<p class="lead" style="align:center"></p>-->
                    
                    <p> 
                    Thanks for giving your details. An OTP has been sent to your Mobile Number. Please enter the 6 digit OTP below for Successful Registration
                    </p>
                        
                    <p></p>
                    <br>
                    <form method="post" id="veryfyotp" action="verify_otp.php">
                        <div class="row">                    
                            <div class="form-group col-sm-9">
                                <span style="color:red;"></span>                    
                                <input type="password" 
                                       class="form-control" 
                                       name="otp" 
                                        
                                       style="font-size:40px;"
                                       maxlength="6"
                                       required="">
                            </div>
                            
                            <button type="submit" class="btn btn-primary col-sm-3">Verify</button>
                            <center><a href="resend_otp.php?user_id=<?php echo $user_id ?>&phone=<?php echo $phone ?>" class="btn btn-link btn-md" role="button" style="color:red;">Resend OTP</a></center>
                            </div>
                            
                    </form>
                    <br><br>
                </div>
            </div>        
        </div>
        <div class="col-lg-3"></div>
        
        
        <div class="col-lg-9"><p style="font-size: 15px; text-align:right;">Designed & Developed by Arka Ghosh Chowdhury</p></div>
        
          
    </div>
</body>

</html>