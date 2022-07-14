<?php
    $msg='';
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel="icon" href="images/favicon.ico">
        <title>College Campus</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--CSS-->
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!--JS-->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            p{
                margin: 50px;
            }
        </style>
        <script>
            function upperChar(){
                var uid = document.getElementById("login-username");
                uid.value = uid.value.toUpperCase();
            }
            // Hiding Default Context Menu
            document.addEventListener('contextmenu', event => event.preventDefault());
        </script>
    </head>
    <body id="background">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top" id="myTopnav" style="background-color:rgb(51,51,51); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.3);">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php" style="font-size: 20px; color:rgb(255,255,255)"><img src="images/favicon_32X32.ico"></a>
                        <a class="navbar-brand" href="index.php" style="font-size: 20px; color:rgb(255,255,255)">CCampus</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a style="font-size: 20px;" href="about_us.php">About Us</a></li>
                            <li><a style="font-size: 20px;" href="contact_us.php">Contact Us</a></li>
                            <li><a style="font-size: 20px;" href="help.php">Help</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="registration.php"><span class="glyphicon glyphicon-edit"></span> Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8  col-sm-offset-2">                    
                <div class="panel panel-info" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0,0,0,0.5);">
                    <!-- LOG IN PANEL HEAD-->
                    <div class="panel-heading" style="background-color:rgba(133,133,173,0.8);">
                        <div class="panel-title" style="color:white; font-family:Gabriola; font-size:40px; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Sign In</div>
                        <div style="float:right; font-size:15px; position: relative; top:-10px;">
                            <a style="color:rgb(51,0,102);" href="#modalLogin" data-toggle="modal">Forgot password?</a></div>
                    </div> 
                </div>
                <!-- MODAL WINDOW -->                      
                <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title">Forgotten Password?</h3>
                            </div>
                            <div class="modal-body">
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="username" type="text" class="form-control" name="usid" value="" placeholder="User Name" onkeyup="lowerChar()">
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input id="phone" type="text" class="form-control" name="phone" placeholder="Phone Number">
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" class="btn_confirm" data-dismiss="modal" value="Submit" name="submit"></div>
                        </div>
                    </div>
                </div>
                <!-- LOG IN PANEL -->                      
                <div class="panel-body" style="padding-top:30px; background:rgba(224,224,235,0.6); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <!-- LOGIN FORM -->
                    <form id="loginform" class="form-horizontal" role="form" action="login_process.php" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="user_id" value="" placeholder="Student Roll No / Employee ID" onkeyup="upperChar()" style="height:45px" title="Spaces, Special Char Not Allowed">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="material-icons" style="font-size: 15px">https</i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password" style="height:45px">
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1">
                                </label>
                                Remember me
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button type="submit" class="btn_confirm" name="submit">Login</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:95%">Don't have an account! 
                                    <a href="registration.php" style="font-size:15px">Sign Up Here</a>
                                </div>
                            </div>
                        </div> 
                    </form>     
                </div>                     
            </div>  
        </div>
        
        <!--- Alert Box -->
        <div class="container">
            <div class="row" style="margin-top: 20px">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <?php if($msg!=''){?>
                        <div class="alert alert-danger alert-dismissible fade in"  id="inCorrectUserIdPassword">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <span><center><?php echo $msg; ?></center></span>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        
        <!-- </div> -->
    
        <div class="col-sm-12">
            <p style="font-size: 15px; text-align: center">Designed & Developed by Arka Ghosh Chowdhury&nbsp;</p>
        </div>
    </body>
</html>