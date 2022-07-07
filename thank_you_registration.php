<?php
    include 'DBlibrary.php';
    $db = new DBlibrary();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="icon" href="images/favicon.ico">
    <title>User Registration | College Campus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
    
    <style>
    #background{
        background:url("images/bg3.jpg");
   }
       #active {
  background-color: #3399ff;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
        }
           
           #active:hover {background-color: crimson}
</style>
    <script>
    // Hiding Default Context Menu
    document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</head>
<body id="background">
    <nav class="navbar navbar-inverse navbar-fixed-top" id="myTopnav"
         style="background-color:rgb(51,51,51); 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.3);">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="index.php" style="font-size: 20px; color:rgb(255,255,255)"><img src="images/favicon_32X32.ico"></a>
                <a class="navbar-brand" 
                   href="index.php" 
                   style="font-size: 20px; 
                          color:rgb(255,255,255)">CCampus</a>
            </div>
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a style="font-size: 20px;" href="about_us.php">About Us</a></li>
                <li><a style="font-size: 20px;" href="contact_us.php">Contact Us</a></li>
                <li><a style="font-size: 20px;" href="help.php">Help</a></li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
            </div>
            </ul>
        </div>
    </nav>
    <div class="col-sm-12 well" 
             style="background-color:rgba(224,224,235,0.6); 
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    margin-top: 100px;
                    margin-left: 370px;
                    width:45%">
        <img src="images/successful_reg.png" 
                         class="img-responsive" 
                         style="width:200px; 
                                height:200px;margin:0 auto;"><br>
        <center><p style="font-family:Allura; font-size:50px; text-shadow: 2px 2px 5px #a0bede;"><strong>You are Successfully<br>Registered</strong></p></center>
        <center><p style="font-family:Annie Use Your Telescope; font-size:25px;">Press <a href="login.php" class="btn btn-primary" role="button" style="border-radius: 20px;" id="active">Login</a> to Continue</p></center>
        
    </div>
    <div class="col-sm-12">
    <p style="font-size: 15px; text-align: center"><br>Designed & Developed by Arka Ghosh Chowdhury&nbsp;</p>
    </div>
</body>