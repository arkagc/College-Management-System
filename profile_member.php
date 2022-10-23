<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        echo "<script>alert('You are not logged In!'); window.location='login.php';</script>";
    }
    include 'DBlibrary.php';
    $db = new DBlibrary();
    $user_id=$_SESSION['user_id'];
    $username=$_GET["username"];
    $row=$db->getUserDetailHome($username);
    $row_mypost=$db->myPost($username);
    $member=$db->groupMember();
?>

<! DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="icon" href="images/favicon.ico">
    <title>Profile | College Campus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
    /**** Horizontal Rule Style Sheet ****/
    hr{
            display:block; 
            border-width: 2px; 
            border-color: #d9d9d9;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1)
        }
        
    input[type=search] {
        width: 130px;
        height: 36px;
        box-sizing: border-box;
        border: 1px dimgrey;
        border-radius: 8px;
        font-size: 16px;
        background-color: dimgrey;
        background-image: url('images/search_icon.png');
        background-position: 6px 0px; 
        background-repeat: no-repeat;
        margin-top: 10px;
        margin-left: 15px;
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    input[type=search]:focus {
        width: 560px;
    }
    ::placeholder {
        color: #d9d9d9;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: white;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: white;
    }
    /* Image Thumbnail Style Sheet */
    #img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }

    img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
        
    /* Scroll bar style sheet*/
    /* width */
    ::-webkit-scrollbar {
        width: 9px;
    }
    /* Scroll bar style sheet*/
    /* width */
    ::-webkit-scrollbar {
        width: 9px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
    }
 
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #cccccc; 
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #a6a6a6; 
    }
 /*Scroll to top button style sheet*/
        #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: rgba(26, 144, 255, 0.6);
  color: white;
  cursor: pointer;
  padding: 8px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.3);
} 
    #myBtn:hover {
  background-color: rgba(26, 144, 255, 0.8);
}
    /* Like Button Style Sheet */
 /* Like Button Style Sheet */
       [id*="like"] {
    font-size: 30px;
    cursor: pointer;
    user-select: none;
    color: #4da9ff;
}
        [id*="like"]:hover {
  color: #1a90ff;
            font-size: 35px;
        }
}
    /**** See All Notification Button Style ****/
        .btnSee {
  border-radius: 4px;
  background-color: rgb(255,255,255);
  border: none;
  color: black;
  text-align: center;
  font-size: 14px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.btnSee span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.btnSee span:after {
  content: 'Notification \00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.btnSee:hover span {
  padding-right: 84px;
}

.btnSee:hover span:after {
  opacity: 1;
  right: 0;
}


        }
    /* Comment Button Style Sheet */
    #comment {
    font-size: 30px;
    cursor: pointer;
    user-select: none;
    color: #66b5ff;
    }
#comment:hover {
    color: #339cff;
    }
    /* MODAL BUTTON STYLE */
            .btn_confirm{
                border-radius: 8px;
                background-color: #4da9ff;
                border: none;
                color: #FFFFFF;
                text-align: center;
                font-size: 15px;
                padding: 8px;
                width: 100px;
                transition: all 0.5s;
                cursor: pointer;
                margin: 5px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .btn_confirm span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }
            .btn_confirm span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }
            .btn_confirm:hover span {
                padding-right: 25px;
            }
            .btn_confirm:hover span:after {
                opacity: 1;
                right: 0;
            }
            .btn_confirm:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.19);
                background-color: #1a90ff;
            }
        
        #seeAll:hover{
            color: #1a90ff;
            font-size: 15px;
        }
        
       
        
        #comment:hover{
            font-size: 35px;
        }
    /**** Accordion Style Sheet ****/
    .accordion {
    background-color: #b3cce6;
    color: #444;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #ccc;
}

.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2212";
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
            /* Upload Image Button Style */
        .btn-upload {
    position: relative;
    overflow: hidden;
    display: inline-block;
}
.btn-upload input[type=file] {
    position: absolute;
    opacity: 0;
    z-index: 0;
    max-width: 100%;
    height: 100%;
    display: block;
}
.btn-upload .btn{
    padding: 8px 20px;
    background: #e0e0eb;
    border: 1px solid #8383af;
    color: black;
    border: 1;
}
.btn-upload:hover .btn{
    padding: 8px 20px;
    background: #4da9ff;
    color: #fff;
    border: 0;
}
     textarea { 
            resize:none;
        }
    
    #suggestions {
            margin-left: 18px;
            font-size: 17px;
            background-color: white;
            position: absolute; 
            z-index: 1;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.7);
            border-width: 0;
            border-radius: 0px 15px 15px 15px;
        }
        #suggestions a{
         color: black;
         font-family:Andika;
        padding-left: 8px;
        padding-bottom: 10px;
        }
        #suggestions a:hover{
            background-color: white;
            display: block;
            text-decoration: none;
            background-color: #b3b3b3;
            color: white;
            font-size: 20px;
        }     
</style>
<script>
 // Hiding Default Context Menu
    document.addEventListener('contextmenu', event => event.preventDefault());
    
    function validate(){
            
            // Blank Post Validation
           var blankPostProfileMember=document.getElementById("postProfileMember").value;
            if(blankPostProfileMember==""){
                alert("Please Write Something. Let everyone know about your post");
                return false;
            }
            //Select Dept. while posting validation
            var filterPostProfileMember=document.getElementById("deptfilterProfileMember").value;
            if(filterPostProfileMember==0){
                alert("Please choose your Department");
                return false;
            }
        }
    
// Script for Scroll to Top Button
// When the user scrolls down 1200px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
    
    function validate(){
            
            // Blank Post Validation
           var blankPostMember=document.getElementById("pstmmbr").value;
            if(blankPostMember==""){
                alert("Please Write Something. Let everyone know about your post");
                return false;
            }
            //Select Dept. while posting validation
            var filterMember=document.getElementById("dptfltrmmbr").value;
            if(filterMember==0){
                alert("Please choose your Department");
                return false;
            }
        }

function scrollFunction() {
    if (document.body.scrollTop > 1200 || document.documentElement.scrollTop > 1200) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
        
// Script for Tooltip
        $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
    
// Multiple Image Upload
        $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr({src: event.target.result, height: "80px", width: "80px"}).appendTo(placeToInsertImagePreview);
                    $($.parseHTML(' ')).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
    
// AJAX Calling for Search Users

  /*      $(document).click(function (event) {
    if ($(event.target).parents("#suggestions").length === 0) {
        $("#suggestions").hide();
    }
});*/
        function suggest_items(item)
{
	var dataString = "item=" + item;
    //alert(dataString);
		$.ajax({  
			type: "POST",  
			url: "autosuggestuser.php",  
			data: dataString,
			success: function(response)
			{
				$('#suggestions').html(response); // Display suggested users
			}
		}); 
}
//This function will fill in the input field for the country when clicked on a particular country from the suggested countries

function selected_item(value_brought) 
{
	$('#user').val(value_brought);
	$('#suggestions').hide();
}
    
</script>
</head>
<body style="background-color: #e0e0eb">
     <!-- Scroll to Top Button -->
    <button onclick="topFunction()" id="myBtn" data-toggle="tooltip" data-placement="left" title="Go To Top"><i class="fa fa-angle-double-up" style="font-size: 30px;"></i></button> 
    
        <!-- Scroll to Top Button -->
    <button onclick="topFunction()" id="myBtn" data-toggle="tooltip" data-placement="left" title="Go To Top"><i class="fa fa-angle-double-up" style="font-size: 30px;"></i></button>
    <!-- Top Navigation Bar -->
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
                 <a class="navbar-brand" href="index.php" style="font-size: 20px; color:rgb(255,255,255);"><img src="images/favicon_32X32.ico"></a>
                <a class="navbar-brand" 
                   href="index.php" 
                   style="font-size: 20px; 
                          color:rgb(255,255,255)">CCampus</a>
            </div>
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a style="font-size: 22px;" href="home_main.php" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" style="font-size: 24px;" href="#" title="Notification"><i class="fa fa-bell-o"></i><span class="badge" style="background:#4db8ff;">10</span>
                    </a>
                    <ul class="dropdown-menu" style="background-color: #e6e6e6; max-height: 560px; width: 400px; overflow-y: scroll">
                         <li style="margin: 0px">
                            <a href="notification_all.php" target="_blank" class="btnSee btn-block btn-default" role="button" style="margin:0px"><span>See All</span></a>
                           </li>
                             
                        <br>
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Arka Ghosh Chowdhury added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Sunny Majumder added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Santanu Roy added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Madhumoitri Saha added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Biswanath Chakraborty added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                       <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Manas Ghosh added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Labani Basak added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Payel Saha added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Meghnath Samaddar added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Priya Gupta added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Satwabdi sarkar added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Priyanka Das added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                       <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Saheli Chakraborty added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Santosh Chandra Mandol added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                       <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Trishita Samanta added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                        
                        <li><a href="#" style="font-family:Andika; font-size:15px; padding: 4px; padding-left: 8px;">
                            <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%;">&nbsp;
                            <strong>Bishal das added a new post</strong>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            2018-03-28 16:52:04</a></li>
                         
                    </ul>
                </li>
                <li><a style="font-size: 25px;" href="#" title="Messege"><i class="fa fa-envelope-o"></i><span class="badge" style="background:#4db8ff;">0</span></a></li>
                <li><input type="search" name="search" id="user" onkeyup="suggest_items(this.value)" placeholder="Search..." title="Type Keyword" style="color:white;">
                <p id="suggestions"></p>
                </li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                        
                       <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 18px;">
                                Post For&nbsp;<span class="caret"></span>
                           </a>
                           <ul class="dropdown-menu" style="background-color: #e6e6e6;">
                               <li class="dropdown-header">POST GRADUATION&nbsp;<span class="caret"></span></li>
                           <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;MCA</a></li>
                               <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;M.Tech</a></li>
                               <li class="dropdown-header">B.TECH&nbsp;<span class="caret"></span></li>
                               <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;AEIEE</a></li>
                               <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;CSE</a></li>
                               <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;ECE</a></li>
                                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;EE</a></li>
                               <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;IT</a></li>
                               <li class="dropdown-header">OTHERS&nbsp;<span class="caret"></span></li>
                           <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;OFFICIAL</a></li>
                               <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;ALL STUDENT</a></li>
                           </ul>
                        </li>
                       <li>
                           <a href="#" title="Group">
                               <i class="material-icons">group</i>
                           </a>
                            </li>
                    <?php if ($_SESSION['profile_picture']==""){?>
                    <li><a href="profile.php" title="My Profile">
                        <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height:25px" alt="Profile Picture">
                        <?php 
                            echo $_SESSION['first_name'];
                        ?>
                        </a></li>
                    <?php }
                    else {?>
                    <li><a href="profile.php" title="My Profile">
                        <img src="profilephoto/<?php echo $_SESSION['profile_picture'];?>" class="img-rounded" style="height:25px; width:25px; border-radius: 50%" alt="Profile Picture">
                        <?php 
                            echo $_SESSION['first_name'];
                        ?>
                        </a></li>
                    <?php } ?>
                    <li><a href="logout.php" title="log out"><i class="fa fa-sign-out" style="font-size:26px"></i></a></li>
            </div>
            </ul>
        </div>
    </nav>
<!------------------------------------------------------------------------------------------------------->
        <!-- Profile page body -->
    <div class="container-fluid" style="margin-top:50px">
    <div class="row">
<!------------------------------------------------------------------------------------------------------->
                <!-- User Information Column -->
            <div class="col-sm-3" style="padding-right:1px;">
                <div class="well" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);">
                <center><p style="font-family:Andika; font-size:23px; text-shadow: 2px 2px 5px #a0bede; cursor: pointer;">
                    <?php //echo $_SESSION['profile_picture'];?>
                    <?php 
                    echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
                    ?>
                    </p></center>
                    <center>
                        <?php if($row['profile_picture']==""){ ?>
                        <a target="_blank" href="images/if_user_1287507.png" data-toggle="tooltip" data-placement="bottom">
                        <img src="images/if_user_1287507.png" alt="Profile Picture" style="border-radius: 50%; height:130px; width:130px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);" id="img">
                        </a>
                        <?php } 
                        else{ ?>
                         <a target="_blank" href="profilephoto/<?php echo $row['profile_picture'];?>" data-toggle="tooltip" data-placement="bottom" title="Click to Expand"> 
                        <img src="profilephoto/<?php echo $row['profile_picture'];?>" alt="Profile Picture" style="border-radius: 50%; height:130px; width:130px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);" id="img"></a>
                        <?php } ?></center>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if($row['designation']!=""){ ?>
                        <p style="font-family:Andika; font-size:18px; cursor: pointer; text-align: center">
                        
                        <?php  echo $row['designation'];
                            }
                        ?>    
                        </p>
                        </div>
                    </div>
                    <hr>
                    
                    <!--<div class="row">
                        <div class="col-sm-12">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar progress-bar-striped active"
                                            role="progressbar"
                                            aria-valuenow="40"
                                            aria-valuemin="0" 
                                            aria-valuemax="100"
                                            style="width: 80%;
                                                   background-color: #66cc99;">
                                </div>
                            </div>
                        </div>
                    </div>-->
                        
                    
                    
                    <div class="row">
                        <div class="col-sm-1">
                            <?php if($row['start_year']!=0 && $row['end_year']!=0){ ?>
                           <i class="fa fa-calendar" style="font-size: 15px; color: #734d26"></i>
                        </div>
                        <div class="col-sm-10">
                        <p style="font-family:Andika; font-size:15px; cursor: pointer; text-align: left;">
                        <?php
                                echo $row['start_year'].'-'.$row['end_year'];
                            }
                        ?>    
                        </p>
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-sm-1">
                            <?php if ($row['phone_number']!=""){ ?>
                           <i class="fa fa-phone" style="font-size: 15px"></i>
                        </div>
                        <div class="col-sm-10">
                        <p style="font-family:Andika; font-size:15px; cursor: pointer; text-align: left">
                            0
                        <?php echo $row['phone_number'];
                        }?>    
                        </p>
                        </div>
                    </div>-->
                    
                    <div class="row" style="margin-bottom: 8px">
                        <div class="col-sm-1">
                           <?php if ($row['email_address']!=""){ ?>
                            <i class="fa fa-at" style="font-size: 15px; color: #734d26"></i>
                        </div>
                        <div class="col-sm-10" style="overflow: hidden">
                        <a href="https://mail.google.com/mail/u/0/?tab=wm#inbox" target="_blank" style="font-family:Andika; font-size:15px; text-decoration: none; text-align: left" data-toggle="tooltip" data-placement="right" title="Open Email">
                        <?php echo $row['email_address'];
                        }?> 
                        </a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-1">
                            <?php if ($row['dob']!=""){ ?>
                           <i class="fa fa-birthday-cake" style="font-size: 15px; color: #734d26"></i>
                        </div>
                        <div class="col-sm-10">
                        <p style="font-family:Andika; font-size:15px; cursor: pointer; text-align: left">
                        <?php echo $row['dob']; } ?>    
                        </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-1">
                            <?php if ($row['hobby']!=""){ ?>
                           <i class="fa fa-child" style="font-size: 15px; color: #734d26"></i>
                        </div>
                        <div class="col-sm-10">
                        <p style="font-family:Andika; font-size:15px; cursor: pointer;">
                        <?php echo $row['hobby']; } ?>    
                        </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-1"><i class="fa fa-home" style="font-size: 15px; color: #734d26"></i> </div>
                      <div class="col-sm-10">
                        <p style="font-family:Andika; font-size:15px; cursor: pointer; text-align: left">
                        <?php if ($row['district']!="" && $row['state']!=""){ ?> 
                            <span style="font-family:Andika; font-size:15px; cursor: pointer; text-align: left">
                            <?php
                            echo $row['district'].",".$row['state'];?></span>
                            <?php }
                            else if($row['district']==""){ ?>
                            <i class="fa fa-home" style="font-size: 15px"></i>
                            <span style="font-family:Andika; font-size:15px; cursor: pointer; text-align: left">    <?php echo $row['state']; ?></span>
                            <?php    }
                            else if($row['state']==""){ ?>
                            <i class="fa fa-home" style="font-size: 15px"></i>
                        <span style="font-family:Andika; font-size:15px; cursor: pointer; text-align: left">     
                            <?php  echo $row['district']; ?></span>
                            <?php }
                            else if($row['district']=="" && $row['state']==""){ ?>
                             <p></p>   
                        <?php    }
                        ?>    
                        </div>
                    </div>
                    <!--<hr>
                    <button class="accordion">My Photos</button>
                        <div class="panel">
                        <p>This is some text</p>
                        </div>

                    <button class="accordion">My Videos</button>
                        <div class="panel">
                        <p>This is another text
                    </div>

                    <button class="accordion">My Files</button>
                        <div class="panel">
                        <p>This is another text
                    </div>-->
                    <script>
                        var acc = document.getElementsByClassName("accordion");
                        var i;

                        for (i = 0; i < acc.length; i++) {
                        acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight){
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        } 
                    });
                    }
                        
                    
                    </script>
                    
                </div>
            </div>
<!------------------------------------------------------------------------------------------------------->
<!-- Well for upload Post-->
        <div class="col-sm-7" style="padding-right:2px;">
                            <div class="well" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); margin-right:13px; padding-left:1px;">
                    <div class="row" style="padding-left:30px;">
                    <p style="font-family:Andika; font-size:18px; text-shadow: 2px 2px 5px #a0bede;">Write your post here...</p>
                    </div>
                    <div class="row" style="padding-left:28px; padding-right:13px;">
                        <form name="frm" action="profile_process.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">
                            <div class="form-group">
                            <textarea class="form-control" rows="3" id="pstmmbr" name="text_post" placeholder="Write Something..." style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2" style="text-align: left; padding-left: 0px;">
                                    <label class="btn-upload">
                                    <input type="file" accept="image/*" multiple name="files[]" id="gallery-photo-add">
                                    <button class="btn"><i class="fa fa-camera"></i> &nbsp;Photo</button>
                                </div>
                                    
                                <div class="col-sm-2" style="text-align: left; padding-left: 0px">
                                    <!--<button type="button" class="btn">Add Video</button>-->
                                    <label class="btn-upload">
                                    <input type="file" accept="video/*" name="vfiles" id="upvideo">
                                    <button class="btn"><i class="fa fa-video-camera"></i> &nbsp;Video</button>
                                </div>
                                        
                                <div class="col-sm-2" style="text-align: left; padding-left: 0px">
                                    <!--<button type="button" class="btn">Add File</button>-->
                                    <label class="btn-upload">
                                    <input type="file" accept="application/*" name="docfiles" id="upfiles">
                                    <button class="btn"><i class="fa fa-file-pdf-o"></i> &nbsp;File</button>
                                </div>
                                    
                                <div class="col-sm-2" style="text-align: left; padding-left: 0px;">
                                    <div class="form-group">
                                <select class="form-control" id="dptfltrmmbr" name="deptfilter" style="width: 145px; height: 38px">
                                <option value="0" hidden>Post for</option>
                                <option value="MCA">MCA</option>
                                <option value="M.Tech">M.Tech</option>
                                <option value="AEIEE">AEIEE</option>
                                <option value="CSE">CSE</option>
                                <option value="ECE">ECE</option>
                                <option value="EE">EE</option>
                                <option value="IT">IT</option>
                                <option value="Official Notice">OFFICIAL</option>
                                <option value="All Student">ALL STUDENT</option>
                                </select>
                                </div>
                                </div>
                                    
                                <div class="col-sm-4" style="text-align: right; padding-right: 0px">
                                    
                                    <input type="submit" name="submit" value="POST" class="btn btn-success" style="font-size: 17px; font-weight: 600" id="selectedButton">
                                    
                                </div>
                                    <div class="col-sm-12">
                                    <div id="listVideos"></div>
                                    <script>
                                    // Video Preview Script
                                        document.getElementById('upvideo').addEventListener('change', handleVideoSelect, true);


                function handleVideoSelect(evt) {
                    var files = evt.target.files; // FileList object

                    // Loop through the FileList and render video files as thumbnails.
                    for (var i = 0; i < files.length; i++) {
                    var f = files[i];
                        // Only process video files.
                        if (!f.type.match('video.*')) {
                                        continue;
                        }
                        createVideoCanvas(f);
                        }
                }

                                        function createVideoCanvas(f){
                var vid = document.createElement('video');
                vid.src = window.URL.createObjectURL(f);
                var canvas = document.createElement('canvas');
                canvas.width  = 180;
                canvas.height = 80;
                vid.addEventListener('loadeddata', function() {
                    canvas.getContext("2d").drawImage(vid, 0, 0, 100, 100);
                            }, false);
                //canvas.getContext("2d").drawImage(vid, 0, 0, 100, 100);
                                                    window.URL.revokeObjectURL(f);                
                            document.getElementById('listVideos').appendChild(canvas);
                                }
                                    </script>
                                    </div>
                            </div>
                                    
                                
                                
                                  <div class="col-sm-12">
                            </div>
                                
                                
                                  <div class="col-sm-12">
                                    <div class="gallery">
                                    </div> 
                                </div>
                                
                                
                        </form>
                    </div>
                </div>
                <!-- Well for Showing Post-->
                <div class="row" style="padding-left: 14px; padding-right: 14px; padding-top: 1px;">
                    <?php 
                    foreach($row_mypost as $post_detail){ 
                        $post_id=$post_detail['post_id'];
                    ?>
                <div class="well" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); margin-right:13px; padding-left:1px;">
                    <!-- Post Header-->
                    <div class="row">
                        <!-- Divider for showing Profile Picture & User Name -->
                        <div class="col-sm-6" style="margin-left: 6px;">
                          <?php if($post_detail['profile_picture']==""){ ?>
                        <img src="images/if_user_1287507.png" alt="Profile Picture" 
                             style="border-radius: 50%; height:30px; width:30px; 
                                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 
                                    0 6px 20px 0 rgba(0, 0, 0, 0.1);"> 
                        <?php } 
                        else{ ?>
                         <a target="_blank" href="profilephoto/<?php echo $post_detail['profile_picture'];?>" data-toggle="tooltip" data-placement="bottom" title="Click to Expand"> 
                        <img src="profilephoto/<?php echo $post_detail['profile_picture'];?>" alt="Profile Picture" style="border-radius: 50%; height:30px; width:30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);"></a>
                        <?php } ?>

                            <?php 
                            echo '<a href="#" style="font-family:Andika; font-size:18px; text-decoration: none;">'.$post_detail["first_name"].' '.$post_detail["middle_name"].' '.$post_detail["last_name"].'</a>';
                            ?>
                        </div>
                       
                        <!--Divider for showing Post Date & Time-->
                        <div class="col-sm-4">
                        <p style="font-family:Andika; font-size:15px; float: right;">
                        <?php echo $post_detail['post_date_time'] ?>    
                        </p>
                          
                        </div>
                        <div class="col-sm-1">
                        <ul style="list-style-type:none;">  
                              <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 18px;"><span><i class="material-icons">settings</i></span>
                           </a>
                           <ul class="dropdown-menu">
                               <li><a href="#"><i class="fa fa-edit"></i>&nbsp;&nbsp;Report Abuse</a></li>
                           </ul>
                        </li></ul>
                        </div>
                    </div>
                    <!-- Divider for showing designation-->
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11">
                            <p style="font-family:Andika; font-size:14px; float: left;">&#9679;&nbsp;<?php echo $post_detail['designation']?></p>&nbsp<span style="color: #cc2900; font-family:Andika; font-size:14px;"><?php echo "(Post for"." ".$post_detail['post_dept'].")"?></span>
                        </div> 
                    </div>
                    <br>
                    <!-- Post Body -->
                    <div class="row" style="padding-left: 20px;">
                        <div class="col-sm-12">
                         <?php if($post_detail['post_desc']!=""){ ?>
                            <p><?php echo $post_detail['post_desc']; ?></p>
                            <?php } ?>
                            
                            
                                <?php if($post_detail['attachment_photo']!=""){ 
                                $imgstr=substr($post_detail['attachment_photo'],1);
                                $tempimage=explode(";",$imgstr);
                                for($i=0;$i<count($tempimage);$i++){ 
                            ?>
                                  <a target="_blank" href="postimage/<?php echo $tempimage[$i]; ?>">
                                      <br>
                                <img src="postimage/<?php echo $tempimage[$i]; ?>" style="width:280px" id="img">
                            </a>
                                
                            <?php }
                            }
                            ?>

                          <?php if($post_detail['attachment_video']!=""){ ?>
                            <video width="480" height="360"controls>
                               <source src="postvideo/<?php echo $post_detail['attachment_video'] ?>" type="video/mp4">
                            </video>
                           <?php } ?> 
                            
                            <?php 
                            if($post_detail['attachment_file']!=""){?>
                            <a target="_blank" style="font-size: 15px; color: #2d5986; border: 1px solid; padding: 10px; box-shadow: 2px 4px #888888; border-radius: 10px; text-decoration: none" href="postdocs/<?php echo $post_detail['attachment_file']; ?>"><?php echo $post_detail["first_name"].' '.$post_detail["middle_name"].' '.$post_detail["last_name"]?>&nbsp;uploaded a new file</a>
                                <!--<img src="postdocs/<?php  echo $post_detail['attachment_file']; ?>" style="width:280px">
                                <object width="400" height="400" data="postdocs/<?php  echo $post_detail['attachment_file']; ?>">
                                </object>-->
                            
                            <?php } ?>
                        </div>
                    </div>
                    <hr style="margin-left: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1)">
                    <!-- Button Divider -->
                <div class="row">
                    <!-- Like Icon Button -->
                    <!--<div class="col-sm-3" style="margin-left: 25px">
                       <i id="like" class="fa fa-thumbs-up" id="like"></i>
                        <span class="badge" style="background-color: #000000">0</span>
                        <span style="font-family:Andika; font-size:18px;">Like</span>
                    </div>-->
                    <!-- Like Icon Button -->
                    <div class="col-sm-3" style="margin-left: 25px;">
                    <?php
                    $conn=new mysqli("localhost","root","","college_campus");
                        $stmt2="select count(*) as like_count from user_like where post_id='$post_id'";
                        //echo $stmt2;
                        $result2=mysqli_query($conn,$stmt2);
                        $row_count=mysqli_fetch_array($result2);
                        $count_like=$row_count['like_count'];
                        
                        $stmt3="select count(*) as like_count from user_like where post_id='$post_id' and user_id='$user_id'";
                        //echo $stmt3;
                        
                       
                        $result3=mysqli_query($conn,$stmt3);
                        $row_count3=mysqli_fetch_array($result3);
                        $count_like_user=$row_count3['like_count'];
                        ?>
                    
                        <?php 
                        //echo $count_like_user;
						 if($count_like_user>0){
						echo "<br>";
                       echo '<i onclick="funclike'.$post_id.'()" id="like'.$post_id.'" class="fa fa-thumbs-up" style="pointer-events: none; color: gray"></i>';
                       echo '<span class="badge" id="badge'.$post_id.'" style="background-color: #000000">'.$count_like.'</span>';
					   ?>
                        <span style="font-family:Andika; font-size:18px;">Like</span>
                        <?php 
						 } 
                         else{ 
					   echo "<br>";
                       echo '<i  style="cursor: pointer;" onclick="funclike'.$post_id.'()" id="like'.$post_id.'" class="fa fa-thumbs-up"></i>';
                             
                       echo '<span class="badge" id="badge'.$post_id.'" style="background-color: #000000">'.$count_like.'</span>';
					   ?>
                        <span style="font-family:Andika; font-size:18px;">Like</span> 
                        <?php 
                            } 
                        
                        echo '<input type="hidden" id="post_id'.$post_id.'" value="'.$post_id.'">';
                        echo '<input type="hidden" id="user_id'.$post_id.'" value="'.$user_id.'">';
                       
                        echo '<script>'; echo "\n";
                        echo '   function funclike'.$post_id.'() {';echo "\n";
                        echo 'var post_id1=$("#post_id'.$post_id.'").val();';echo "\n";
                            
                        echo 'var user_id1=$("#user_id'.$post_id.'").val();';echo "\n";
                            //alert(user_id);
                        echo 'document.getElementById("like'.$post_id.'").style.color="gray";';echo "\n";
                            
                            //x.classList.toggle("fa-thumbs-down");
	                    echo 'datastr="post_id="+post_id1+"&user_id="+user_id1;';echo "\n";
	                      // alert(datastr);
                        echo '   $.ajax({';
	                    echo '   type:"POST",';echo "\n";
	                    echo '   data:datastr,';echo "\n";
                        echo '   url:"like.php",';echo "\n";
                        echo '   success:function(result){';echo "\n";
						//echo 'alert("ddd");';
                        echo '   $("#badge'.$post_id.'").html(result);';echo "\n";
	                    echo '     }' ; echo "\n";
	                    echo '  });';echo "\n";
	                    echo '  document.getElementById("like'.$post_id.'").style.pointerEvents="none";';echo "\n";
                        echo '}';echo "\n";
                        echo '</script>';echo "\n";
                    ?>
                    </div>

                    <!-- Dislike Icon Button -->
                    <div class="col-sm-3" style="margin-left: 25px">
                        <i class="fa fa-thumbs-down" id="like"></i>
                        <span class="badge" style="background-color: #000000">0</span>
                        <span style="font-family:Andika; font-size:18px;">Dislike</span>
                    </div>
                    <!-- Comment Icon Button -->
                    <div class="col-sm-3" style="margin-left: 25px;">
                        <i class="fa fa-comments-o" id="comment" href="#modalComment" data-toggle="modal"></i>
                        <span class="badge" style="background-color: #000000">0</span>
                        <span style="font-family:Andika; font-size:18px;">Comment</span>
                        
                    </div>
                    </div>
                    
                    <!-- MODAL WINDOW FOR COMMENT-->                      
                <div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #f2f2f2; height: 60px">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h3 style="font-family:Andika; font-size:24px; text-shadow: 2px 2px 5px #a0bede;" class="modal-title">Comment Here !</h3>
                            </div>
                            <div class="modal-body"><form>
                                <textarea class="form-control" rows="3" id="post" placeholder="Write Your Comment Here..." value=""></textarea>
                                <input type="submit" class="btn_confirm" data-dismiss="modal" value="Comment" name="comment"></div>
                                </form>
                        </div>
                    </div>
                </div>
                
                    <br>
                <!-- Comment Text -->
                    <?php 
                    $cmnt=$db->comment($post_id);
                    foreach($cmnt as $cmnt_det){ 
                    ?>
                    <div class="container" style="">
                <div class="row">
                    <div class="col-sm-9" style="margin-top: 10px">
                 <a href="#" style="text-decoration:none;" data-toggle="tooltip" data-placement="top" title="Click to View">
                        <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%; margin-left: 8px;">&nbsp;
                        <span style="font-family:Andika; font-size:16px;">
                        <?php echo $cmnt_det['first_name'].' '.$cmnt_det['middle_name'].' '.$cmnt_det['last_name']?>
                        </span>
                        </a>
                    </div>
                    <div class="col-sm-3" style="margin-top: 10px">
                        <span class="glyphicon glyphicon-time">
                            <span style="font-family:Andika; font-size:12px; padding-left: 0px">2018-03-28, 21:24:09</span></span>
                    </div>
                </div> 
                <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11" style="padding-right: 12px;">
                    <div class="well" style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1); padding: 5px">
                        <?php echo $cmnt_det['comment_desc'] ?>
                    </div>    
                </div>
                </div>
                    </div>
                    <?php } ?>
                </div>
                    <?php } ?>
                </div>

            
<!------------------------------------------------------------------------------------------------------->
    
                </div>
                    
<!------------------------------------------------------------------------------------------------------->            <!-- Group Member Divider -->
            <div class="col-sm-2" style="padding-left:1px;">
                <div class="well" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); height: 95%; position: fixed; overflow-y:scroll;">
                <div class="row">
                    <div class="col-sm-1"> <i class="material-icons" style="font-size: 28px;">group</i></div>
                    <div class="col-sm-10"><p style="font-family:Andika; font-size:16px; text-shadow: 2px 2px 5px #a0bede;" title="College Campus Users">CCampus Member</p></div>
                </div>

                <div class="row">
               
                <ul style="list-style-type:none; padding-left:14px;">
                    <?php 
                        foreach($member as $memberName){
                    ?>
                    <li><a href="profile_member.php?username=<?php echo $memberName['user_id']?>" style="text-decoration:none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Click to View">
                        <?php if($memberName['profile_picture']==""){ ?>
                        <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%; margin: 2px;">&nbsp;
                        <?php } else { ?>
                    
                        <img src="profilephoto/<?php echo $memberName['profile_picture'];?>" class="img-rounded" style="height: 30px; width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1); border-radius: 50%; margin: 2px;">&nbsp;
                        <?php } ?>
                         <?php
                        echo $memberName['first_name']." ".$memberName['last_name'];
                        ?>
                        </a></li>
                    <?php } ?>
                </ul>
                 
                </div>
                </div>
            </div>

    </div>
    </div>
</body>
</html>