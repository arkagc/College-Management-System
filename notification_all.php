<?php
    session_start();
 
 if (!isset($_SESSION['user_id'])){
     echo "<script>alert('You are not logged In!'); window.location='login.php';</script>";
 }
    include 'DBlibrary.php';
    $db = new DBlibrary();
    $user_id=$_SESSION['user_id'];
    $row=$db->getUserDetailHome($user_id);
    $row_post=$db->getPost();
    $member=$db->groupMember();
    
    //echo $row_post['attachment_photo'];
    //die;

    
    
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="icon" href="images/favicon.ico">
    <title>Notification | College Campus</title>
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
     hr{
            display:block; 
            border-width: 2px; 
            border-color: #b3b3b3;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.4)
        }
 #font
   {
     color:red;
   }   
    h1
   {
    text-align:center;
	font-family:Gabriola;
	font-size:45px;
	color:white;
	text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
   }
    #background{
        background:url("images/background_notification_trans.png");
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
    #seeAll:hover{
            color: #1a90ff;
            font-size: 15px;
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
 
</style>
<script>
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
<body id="background">
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
                            <a href="notification_all.php" class="btnSee btn-block btn-default" role="button" style="margin:0px"><span>See All</span></a>
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
                                Department<span class="caret"></span>
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
                           </ul>
                        </li>
                       <li>
                           <a href="group.php" title="Group">
                               <i class="material-icons">group</i>
                           </a>
                            </li>
                       
                    <?php if ($row['profile_picture']==""){?>
                    <li><a href="profile.php" title="My Profile">
                        <img src="images/profile_avatar_30X30.png" class="img-rounded" style="height:25px" alt="Profile Picture">
                        <?php 
                            echo $row['first_name'];
                        ?>
                        </a></li>
                    <?php }
                    else {?>
                    <li><a href="profile.php" title="My Profile">
                        <img src="profilephoto/<?php echo $row['profile_picture'];?>" class="img-rounded" style="height:25px; width:25px; border-radius: 50%" alt="Profile Picture">
                        <?php 
                            echo $row['first_name'];
                        ?>
                        </a></li>
                    <?php } ?>
                    <li><a href="logout.php" title="log out"><i class="fa fa-sign-out" style="font-size:26px"></i></a></li>
            </div>
            </ul>
        </div>
    </nav>
    <!---------------- ALL NOTIFICATION ------------------------->
    <div class="col-sm-10">
    <div class="well" style="margin-top: 45px; background-color: rgba(255,255,255,0.5);box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);">
        <p style="font-family:Andika; font-size:23px; text-shadow: 2px 2px 5px #a0bede; cursor: pointer;"><i class="fa fa-bell"></i> Your All Notifications</p>
        <hr>
        <div class="col-sm-12">
            <div class="col-sm-8" style="text-align: left;">
                <a href="#" style="font-family:Andika; font-size:15px; color: black">
                <i class="fa fa-arrow-circle-right"></i>
                    <strong>Arka Ghosh Chowdhury added a new post</strong>
                </a>
            </div>
            <div class="col-sm-4" style="text-align: right">                
                <p style="font-family:Andika; font-size:15px;">
                    <span class="glyphicon glyphicon-time">
                <strong>2018-03-28 16:52:04</strong>
                </p>
            </div>
        </div>
        <br>
        <div class="col-sm-12">
            <div class="col-sm-8" style="text-align: left;">
                <a href="#" style="font-family:Andika; font-size:15px; color: black">
                    <i class="fa fa-arrow-circle-o-right"></i>
                    Sunny Majumder added a new post
                </a>
            </div>
            <div class="col-sm-4" style="text-align: right;">
                <p style="font-family:Andika; font-size:15px;">
                    <span class="glyphicon glyphicon-time">
                2018-03-28 16:52:04
                </p>
            </div>
        </div>
        <br>
        </div>

    </div>
    <!---------------- CCAMPUS MEMBER ---------------------------->
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
</body>
</html>