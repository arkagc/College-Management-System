<?php
    include 'DBlibrary.php';
    $db = new DBlibrary();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="icon" href="images/favicon.ico">
    <title>College Campus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style type="text/css">
        #background{
            background:url("images/bg3.jpg");
            width: 100%;
        }
        h1{
            text-align:center;
            color:white;
            font-family:Gabriola;
            font-size:45px;
            text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
        }
        .btn_confirm{
            border-radius: 4px;
            background-color: #33adff;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 20px;
            padding: 6px;
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
        }
           
        .btn_clear {
            border-radius: 4px;
            background-color: #cc3300;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 20px;
            padding: 6px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .btn_clear span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        .btn_clear span:after {
            content: 'x';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        .btn_clear:hover span {
            padding-right: 25px;
        }
        .btn_clear:hover span:after {
            opacity: 1;
            right: 0;
        }
        .btn_clear:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.4);
        }
    </style>
    
    <script>
        var d=new Date();
        var current_year=d.getFullYear();
        //alert(current_year);
        
        function newPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function confirmPassword() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function init(){
            document.getElementById("start_year").disabled=true; 
            document.getElementById("end_year").disabled=true; 
           var min_year
           //alert(current_year);
           //var current_year;
            min_year=current_year-3;
           // var max_year=current_year+4;
         //   alert(max_year);
            var i;
            for(i=min_year;i<=current_year;i++)
            {
                var op1=new Option(i)
                frm.start_year.add(op1)
            }
        }
        function changeYear()
        {
            var length=frm.end_year.length;
            for (var i=length-1;i>=0;i--)
            {
                frm.end_year.remove(i);
            }
            var k=0;
            var min_year=current_year-3;
            //alert(min_year);
            frm.end_year.remove(0);
            
            if(frm.start_year.selectedIndex!=0)
            {
               k=Number(min_year+frm.start_year.selectedIndex);  
               var j=0;
               for (j=k;j<=k+3;j++)
                {
                    var op2=new Option(j)
                    frm.end_year.add(op2)
                    frm.end_year.selectedIndex=0
                }
            }
        }
        
        function upperChar() {
            var f = document.getElementById("fname");
            f.value = f.value.toUpperCase();
                
            var m = document.getElementById("mname");
            m.value = m.value.toUpperCase();
                
            var l = document.getElementById("lname");
            l.value = l.value.toUpperCase();
                
            var u = document.getElementById("usid");
            u.value = u.value.toUpperCase();
                
            var ad = document.getElementById("addr");
            ad.value = ad.value.toUpperCase();
                
            var h = document.getElementById("hob");
            h.value = h.value.toUpperCase();
        }
        
        function lowerChar(){
            var uid = document.getElementById("usid");
            uid.value = uid.value.toLowerCase();
            
            var mail_id = document.getElementById("mail");
            mail_id.value = mail_id.value.toLowerCase();
        }

        function validate_fname()
        {
            var f_name=document.getElementById("fname").value;
                
            if(f_name==""){
                document.getElementById("fname_error").innerHTML=" First Name cannot be blank";
                document.frm.fname.focus();
                return false;
            }
            else{
               document.getElementById("fname_error").innerHTML=""; 
            }
        }
        function validate(){
            //First Name Validation
                var f_name=document.getElementById("fname").value;
                
                if(f_name==""){
                    document.getElementById("fname_error").innerHTML=" First Name cannot be blank";
                    document.frm.fname.focus();
                    return false;
                }
                var chr1;
                var i;
                for(i=0;i<f_name.length;i++){
                     chr1=f_name.substr(i,1);
                    if(!(chr1>='A' && chr1<='Z') && !(chr1>='a' && chr1<='z')){
                        document.getElementById("fname_error").innerHTML="Please enter valid First Name";
                        document.frm.fname.focus();
                        return false;
                    }    
                }
            //Middle Name Validation
                var m_name=document.getElementById("mname").value;
                var chr2;
                var j;
                for(j=0;j<m_name.length;j++){
                    chr2=m_name.substr(j,1);
                    if(!(chr2>='A' && chr2<='Z') && !(chr2>='a' && chr2<='z')){
                        document.getElementById("mname_error").innerHTML="Please enter valid Middle Name";
                        document.frm.mname.focus();
                        return false;
                    }
                }
               
            //Last Name Validation
            var l_name=document.getElementById("lname").value;
                if(l_name==""){
                    document.getElementById("lname_error").innerHTML="Last Name cannot be blank";
                    document.frm.lname.focus();
                    return false;
                }
                var chr3;
                var k;
                for(k=0;k<l_name.length;k++){
                     chr3=l_name.substr(k,1);
                    if(!(chr3>='A' && chr3<='Z') && !(chr3>='a' && chr3<='z')){
                        document.getElementById("lname_error").innerHTML="Please enter valid Last Name";
                        document.frm.lname.focus();
                        return false;
                    }    
                }
        }
        
        function abc(){
            if (document.getElementById("desg").value=="Student")
                {
                    document.getElementById("start_year").disabled=false;
                    document.getElementById("end_year").disabled=false;
                }
            else{
                document.getElementById("start_year").disabled=true;
                document.getElementById("end_year").disabled=true;
            }
        }
        // Script for Tooltip
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
            // Hiding Default Context Menu
            document.addEventListener('contextmenu', event => event.preventDefault());
        });
    </script>
</head>

<body id="background" onload="init()">
    <div class="container">
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
    
        <h1 class="well" 
            style="text-align:center; 
                   margin-top:50px; 
                   background-color:rgba(133,133,173,0.8); 
                   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0,0,0,0.5);">Registration Form</h1>
        <div class="col-lg-12 well" 
             style="background-color:rgba(224,224,235,0.6); 
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="row">
                <form name="frm" action="registration_process.php" method="post" onsubmit="return validate()" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        
                        
                        
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                
                                <i class="fa fa-user" style="font-size: 14px"></i>
                                <label style="font-size: 12px">First Name<span style="color:red">&nbsp;*</span></label>                                
                                <input type="text" class="form-control" name="fname" id="fname" onkeyup="upperChar()" onblur="validate_fname()" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="Should be letters only" placeholder="First Name"><span id="fname_error" style="color:red"></span> 
                            </div>	
                            <div class="col-sm-4 form-group">
                                <i class="fa fa-user" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Middle Name</label>
                                <input type="text" class="form-control" name="mname" id="mname" onkeyup="upperChar()" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="Should be letters only"  placeholder="Middle Name"><span id="mname_error" style="color:red"></span>
                            </div>	
                            <div class="col-sm-4 form-group">
                                <i class="fa fa-user" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Last Name<span style="color:red">&nbsp;*</span></label>                                
                                <input type="text" class="form-control" name="lname" id="lname" onkeyup="upperChar()" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="Should be letters only"  placeholder="Last Name"><span id="lname_error" style="color:red"></span>
                            </div>		
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <i class="fa fa-briefcase" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Department / Section<span style="color:red">&nbsp;*</span></label>
                                <select name="dept" id="dept" class="form-control">
                                    <option value=0 hidden>Select Department / Section</option>
                                    <option value=Academic>Academic</option>
                                    <option value=Administrative>Administrative</option>
                                    <option value=Training & Placement>Training & Placement</option>
                                    <option value=Library>Library</option>
                                    <option value=Finance>Finance</option>
                                    <option value=Examination Cell>Examination Cell</option>
                                </select><span id="dept_error" style="color:red"></span>
                            </div>		
                            <div class="col-sm-6 form-group">
                                <i class="fa fa-address-card" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Designation<span style="color:red">&nbsp;*</span></label>
                                <select name="desg" id="desg" class="form-control" onchange="abc()">
                                    <option value=0 hidden>Select Designation</option>
                                    <option value=Staff>Staff</option>
                                    <option value=Student>Student</option>
                                    
                                </select>
                                
                                
                                
                                <span id="desg_error" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <i class="fa fa-calendar-plus-o" style="14px"></i>
                                <label style="font-size: 12px">Starting Year <span style="color:#2e5cb8">(Only for Student)</span></label>
                                <select 
                                        name="start_year" 
                                        id="start_year" 
                                        onChange="changeYear()"
                                        class="form-control">
                                    <option value="0">Select Starting Year</option>
                                </select>
                            </div>		
                            <div class="col-sm-6 form-group">
                                <i class="fa fa-calendar-times-o" style="14px"></i>
                                <label style="font-size: 12px">Ending Year <span style="color:#2e5cb8">(Only for Student)</span></label>
                                <select 
                                        name="end_year1" 
                                        id="end_year" 
                                        class="form-control">
                                    <option value="0">Select Ending Year</option>
                                </select>
                            </div>	 
                        </div>
                        
                        <div class="row">
                            <!--<div class="col-sm-3 form-group">
                                <i class="material-icons" style="font-size: 14px">verified_user</i>
                                <label style="font-size: 12px">Student Roll No<span style="color:red">&nbsp;*</span></label>
                                <input type="text" placeholder="It will be your user id" class="form-control" name="usid" id="usid" onkeyup="upperChar()" onfocus="this.value=''" onblur="chkuser()" data-toggle="tooltip" data-placement="bottom" title="Spaces, Special Char Not Allowed"><span id="usid_error" style="color:red"></span><span id="msg"></span>
                                <script>
                                    function chkuser()
                                    {
                                        var data=$("#usid").val();
                                        var strdata="name1="+data;

                                        $.ajax({
                                            type:"POST",
                                            url:"validate_student_roll_nymber.php",
                                            data:strdata,
                                            success:function(result){
                            
	                                       $("#msg").html(result);
                                                alert(result);
                                                if(result=='<span style="color:green">Valid User Id</span>'){
                                            document.getElementById("password").disabled=false;
                                            document.getElementById("confirm_password").disabled=false;
                                            document.getElementById("addr").disabled=false;
                                            document.getElementById("state").disabled=false;
                                            document.getElementById("zip").disabled=false;
                                            document.getElementById("mail").disabled=false;
                                            document.getElementById("ph_no").disabled=false;
                                            document.getElementById("dob").disabled=false;
                                            document.getElementById("gender").disabled=false;
                                            document.getElementById("hob").disabled=false;
                                            document.getElementById("dept").disabled=false;
                                            document.getElementById("desg").disabled=false;
                                            //document.getElementById("empid").disabled=false;
                                            //document.getElementById("start_year").disabled=false;
                                            //document.getElementById("end_year").disabled=false;
                                            document.getElementById("file").disabled=false;
                                            document.getElementById("submit").disabled=false;
                                                }else{
                                            document.getElementById("password").disabled=true;
                                            document.getElementById("confirm_password").disabled=true; 
                                                document.getElementById("addr").disabled=true; 
                                                document.getElementById("state").disabled=true; 
                                                document.getElementById("zip").disabled=true; 
                                                document.getElementById("mail").disabled=true; 
                                                document.getElementById("ph_no").disabled=true; 
                                                document.getElementById("dob").disabled=true; 
                                                document.getElementById("gender").disabled=true; 
                                                document.getElementById("hob").disabled=true; 
                                                document.getElementById("dept").disabled=true; 
                                                document.getElementById("desg").disabled=true; 
                                                //document.getElementById("empid").disabled=true;
                                                //document.getElementById("start_year").disabled=true; 
                                                //document.getElementById("end_year").disabled=true;
                                                document.getElementById("file").disabled=true;
                                                document.getElementById("submit").disabled=true;
                                                }
                                                
                                            }
                                        });
                                            
                                    }
</script>
                            </div>	-->
                             <div class="col-sm-4 form-group">
                                <i class="material-icons" style="font-size: 14px">verified_user</i>
                                <label style="font-size: 12px">Student Roll No / Employee Id<span style="color:red">&nbsp;*</span></label>
                                <input type="text" placeholder="It will be your user id" class="form-control" name="usid" id="usid" onkeyup="upperChar()" onfocus="this.value=''" onblur="chkemp()" data-toggle="tooltip" data-placement="bottom" title="Spaces, Special Char Not Allowed"><span id="usid_error" style="color:red"></span><span id="msg"></span>
                                <script>
                                    function chkemp()
                                    {
                                        var data=$("#usid").val();
                                        var strdata="name1="+data;

                                        $.ajax({
                                            type:"POST",
                                            url:"validate.php",
                                            data:strdata,
                                            success:function(result){
                            
	                                       $("#msg").html(result);
                                                //alert(result);
                                                //if(result=='<span style="color:green">Valid User Id</span>'){
                                            //document.getElementById("password").disabled=false;
                                            //document.getElementById("confirm_password").disabled=false;
                                            //document.getElementById("addr").disabled=false;
                                            //document.getElementById("state").disabled=false;
                                            //document.getElementById("zip").disabled=false;
                                            //document.getElementById("mail").disabled=false;
                                            //document.getElementById("ph_no").disabled=false;
                                            //document.getElementById("dob").disabled=false;
                                            //document.getElementById("gender").disabled=false;
                                            //document.getElementById("hob").disabled=false;
                                            //document.getElementById("dept").disabled=false;
                                            //document.getElementById("desg").disabled=false;
                                            //document.getElementById("local_code").disabled=false;
                                            //document.getElementById("fname").disabled=false;
                                            //document.getElementById("mname").disabled=false;
                                            //document.getElementById("lname").disabled=false;
                                            //document.getElementById("file").disabled=false;
                                            //document.getElementById("submit").disabled=false;
                                              //  }else{
                                            //document.getElementById("password").disabled=true;
                                            //document.getElementById("confirm_password").disabled=true; 
                                                //document.getElementById("addr").disabled=true; 
                                                //document.getElementById("state").disabled=true; 
                                                //document.getElementById("zip").disabled=true; 
                                                //document.getElementById("mail").disabled=true; 
                                                //document.getElementById("ph_no").disabled=true; 
                                                //document.getElementById("dob").disabled=true; 
                                                //document.getElementById("gender").disabled=true; 
                                                //document.getElementById("hob").disabled=true; 
                                                //document.getElementById("dept").disabled=true; 
                                                //document.getElementById("desg").disabled=true; 
                                                //document.getElementById("local_code").disabled=true; 
                                                //document.getElementById("fname").disabled=true;
                                                //document.getElementById("mname").disabled=true;
                                                //document.getElementById("lname").disabled=true;
                                                //document.getElementById("file").disabled=true;
                                                //document.getElementById("submit").disabled=true;
                                              //  }
                                                
                                            }
                                        });
                                            
                                    }
</script>
                            </div>	
                            <div class="col-sm-4 form-group">
                                <i class="material-icons" style="font-size: 14px;">lock</i>
                                <label style="font-size: 12px">New Password<span style="color:red">&nbsp;*</span></label>
                                <input type="password" placeholder="Min 8 character" class="form-control" id="password" name="password" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="Should be Alpha Numeric"><span id="password_error" style="color:red"></span>
                                <!-- toggle between password visibility -->
                                <input type="checkbox" style="height: 12px; width: 12px; cursor: pointer" onclick="newPassword()">&nbsp;<span style="font-size: 12px">Show Password</span>
                            </div>	
                            <div class="col-sm-4 form-group">
                                <i class="material-icons" style="font-size: 14px; color: red">lock</i>
                                <label style="font-size: 12px">Confirm Password<span style="color:red">&nbsp;*</span></label>
                                <!-- toggle between password visibility -->
                                <input type="password" placeholder="Re-enter new password" class="form-control" id="confirm_password" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="Re-enter your New Password"><span id="confirm_password_error" style="color:red"></span>
                                <input type="checkbox" style="height: 12px; width: 12px"  onclick="confirmPassword()">&nbsp;<span style="font-size: 12px">Show Password</span>
                            </div>		
                        </div>
                          <div class="row">
                            <div class="col-sm-6 form-group">
                               <i class="fa fa-at" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Email Address<span style="color:red">&nbsp;*</span></label>
                                <input type="email" class="form-control" name="mail" id="mail" onfocus="this.value=''" onkeyup="lowerChar()" data-toggle="tooltip" data-placement="bottom" title="Current & Active Mail Id for future communication" placeholder="Enter Active Email Address">
                                <span id="mail_error" style="color:red"></span>
                            </div>	
                            <div class="form-inline">
                            <div class="col-sm-6 form-group">
                                <span class="glyphicon glyphicon-phone"></span>
                                <label style="font-size: 12px">Phone Number<span style="color:red">&nbsp;*</span></label><br>
                                <label style="font-size: 12px"><input type="text" id="local_code" value="+91" size="1" style="height:31px; padding-left:1px; border-radius: 2px;" readonly></label>
                                <span><input type="text" class="form-control" style="width:87%" placeholder="10-Digit Phone Number" name="ph_no" id="ph_no" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="Maximum Length 10 Digits"></span>
                                <span id="ph_no_error" style="color:red"></span>
                            </div>
                                </div>
                        </div>	
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <i class="fa fa-home" style="font-size: 16px"></i>
                                <label style="font-size: 12px">District</label>
                                <input type="text" class="form-control" name="addr"  id="addr" placeholder="Select District" onkeyup="upperChar()" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="Enter Your District"><span id="addr_error" style="color:red"></span>
                            </div>	
                            <div class="col-sm-4 form-group">
                                <i class="material-icons" style="font-size: 14px">place</i>
                                <label style="font-size: 12px">State</label>
                                <select class="form-control" id="state" name="state" >
                                    <option value=0>Select State</option>
                                    <?php
                                        $result=$db->selectState();
                                        foreach($result as $row){
                                    ?>
                                    <option value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>	
                            <div class="col-sm-4 form-group">
                                <label style="font-size: 12px">Postal Code</label>
                                <input type="text" class="form-control" name="zip" id="zip"  data-toggle="tooltip" data-placement="bottom" title="Should Contain Numeric Only" placeholder="ZIP Code">
                                <span id="zip_error" style="color:red" onfocus="this.value=''"></span>
                            </div>		
                        </div>
                      					
                       
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <label style="font-size: 12px">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" onfocus="this.value=''">
                            </div>	
                            <div class="col-sm-4 form-group">
                                <i class="fa fa-odnoklassniki" style="font-size:14px"></i>
                                <label style="font-size: 12px">Gender</label>
                                <select name="gender" id="gender"  class="form-control">
                                <option value="0">I am...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>   
                            </div>	
                            <div class="col-sm-4 form-group">
                                <i class="fa fa-child" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Hobby(s)</label>
                                <input type="text" placeholder="multiple-separated by ," class="form-control" name="hob" id="hob" onkeyup="upperChar()" onfocus="this.value=''" data-toggle="tooltip" data-placement="bottom" title="More Than One Hobby Separated by /">
                                <span id="hob_error" style="color:red"></span>
                            </div>		
                        </div>
                       
                        <!--<div class="row">
                            <div class="col-sm-6 form-group">
                                <i class="fa fa-briefcase" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Department / Section<span style="color:red">&nbsp;*</span></label>
                                <select name="dept" id="dept" class="form-control">
                                    <option value=0 hidden>Select Department / Section</option>
                                    <option value=Academic>Academic</option>
                                    <option value=Administrative>Administrative</option>
                                    <option value=Training & Placement>Training & Placement</option>
                                    <option value=Library>Library</option>
                                    <option value=Finance>Finance</option>
                                    <option value=Examination Cell>Examination Cell</option>
                                </select><span id="dept_error" style="color:red"></span>
                            </div>		
                            <div class="col-sm-6 form-group">
                                <i class="fa fa-address-card" style="font-size: 14px"></i>
                                <label style="font-size: 12px">Designation<span style="color:red">&nbsp;*</span></label>
                                <select name="desg" id="desg" class="form-control" onchange="abc()">
                                    <option value=0 hidden>Select Designation</option>
                                    <option value=Staff>Staff</option>
                                    <option value=Student>Student</option>
                                    
                                </select>
                                
                                
                                
                                <span id="desg_error" style="color:red"></span>
                            </div>
                        </div>-->
                        
                       
                        
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <i class="fa fa-user-circle-o" style="font-size:20px; color: #006bb3"></i>
                                <label style="font-size: 12px">Select Profile Photo to Upload</label>
						  <input type="file" accept="image/*" name="file" id="file" style="color:blue" data-toggle="tooltip" data-placement="left" title="Max Size 7.5 MB">
                            </div>		
                            <div class="col-sm-6 form-group">
                                <br>
                                <label style="color:red;float:right;">( * ) indicates mandatory fields</label>
                                
                            </div>	 
                        </div>
                            <center>
                                <input type="submit" class="btn_confirm" value="Submit" name="submit" id="submit">
                                <input type="reset" class="btn_clear" value="Clear" name="clear">
                            </center>
                    </div>
                </form> 
            </div>
        </div>
        <p style="font-size: 15px; text-align: center">Designed & Developed by Arka Ghosh Chowdhury</p>   
    </div>
</body>

</html>