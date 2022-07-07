<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="icon" href="images/favicon.ico">
    <title>Welcome | College Campus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>

    <style type="text/css">
    /*full screen image style*/
        body, html {
        height: 100%;
        margin: 0;
        }

        .index-image {
        background-image: url("images/index.jpg");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        }

        .index-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: floralwhite;
        font-family: cursive;
        }

        .index-text button {
        border: none;
        border-radius: 10px 10px 10px 10px;
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 10px 25px;
        color: black;
        background-color: rgba(255,255,240,0.5);
        text-align: center;
        font-size: 20px;
        font-family: Comic Sans MS;
        text-shadow: 2px 2px #dfbf9f;
        cursor: pointer;
        }

        .index-text button:hover {
        background-color: rgb(191,191,191);
        color: black;
        }
    
        /*side navigation bar style*/
        body {
        font-family: "Lato", sans-serif;
        transition: background-color .5s;
        }

        .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.5);
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        }

        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        }

        #main {
        transition: margin-left .5s;
        padding: 16px;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
    
        #content {
        position: absolute;
        bottom: 0;
        background: rgba(0, 0, 0, 0.2); /* Black background with transparency */
        color: #f1f1f1;
        width: 97%;
        height: 5%;
        padding: 20px;
        color: khaki;
        }
    </style>
    
    
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
        <a href="about_us.php" title="Know about Website & Developers">About Us</a>
        <a href="contact_us.php" title="Reach to us">Contact</a>
    </div>

</body>
</html>