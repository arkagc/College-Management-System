<?php
$value=$_POST['name1'];
$server="localhost";
$user="root";
$pwd="";
$dbname="college_campus";
$conn=new mysqli($server,$user,$pwd,$dbname);
$select="select user_id from user_master where user_id='$value'";
$result=mysqli_query($conn,$select);
//$row=mysqli_fetch_array($result);
$num_rows=mysqli_num_rows($result);
if ($num_rows>0){
	echo '<span style="color:green">Valid User Id</span>';
}
else
{
  echo '<span style="color:red">Invalid User Id</span>';
}
?>