<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel="icon" href="images/favicon.ico">
        <title>College Campus</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--CSS-->
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!--JS-->
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        
        
        <script type="text/javascript">
        // Hiding Default Context Menu
            document.addEventListener('contextmenu', event => event.preventDefault());
        /* Open when someone clicks on the span element */
            function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }
        /* Close when someone clicks on the "x" symbol inside the overlay */
            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
            }
        </script>
    </head>

    <body> 
        <div class="index-image">
            <div class="index-text">
                <h1 title="College Networking Website" style="font-size:70px; text-shadow: 2px 2px 4px #000000;">College Campus</h1>
                <p style="font-size:30px; font-style: oblique; font-size: 40px; text-shadow: 2px 2px 4px #000000;">Welcomes You</p>
                <button title="Click to Enter" onclick="openNav()">Welcome</button>
            </div>
            <div id="content">
                <p style="font-size: 15px; text-align: right">Designed & Developed by Arka Ghosh Chowdhury</p>
            </div>
        </div>
        
        <!-- The side nav-->
        <div id="mySidenav" class="sidenav">
        <!-- Button to close the side navigation -->
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <!-- side nav content-->
            <a href="login.php" title="Click to Log In">Sign In</a>
            <a href="registration.php" title="Click to Register">Sign Up</a>
            <!-- <a href="about_us.php" title="Know about Website & Developers">About Us</a>
            <a href="contact_us.php" title="Reach to us">Contact</a> -->
        </div>
    </body>
</html>