<?php
    include 'DBconnect.php';
    $db = new DBconnect();
    $conn=$db->connect();

if(isset($_POST['item']) && !empty($_POST['item']))  // Page validation against empty field
{
	// This is the item to search for in the database
	$this_item = trim(strip_tags($_POST['item']));
	//echo $this_item;
if($this_item == "") 
	{
		
		echo '<div class="un_suggested_items">There was no data passed</div>';
	}
	else
	{
		$select= "select user_id, CONCAT(first_name, ' ', middle_name,' ', last_name) as username from user where first_name like '".($this_item)."%' order by first_name asc";
		//echo $select;
		//die;
		$check_item = mysqli_query($conn,$select);
		if(mysqli_num_rows($check_item) > 0) 
		{
			
			echo '<div style="border:solid 1px;height:200px;width:560px;overflow-y:scroll;">';
			
			while ($get_item = mysqli_fetch_array($check_item)) 
			{
				$user = trim($get_item["user_id"]);
                //echo $user;
				echo '<div id="user_name"><a href="profile_member.php?username='.$user.'">'.$get_item["username"].'</a></div>';
			}
			
			//echo '</div>';
		} 
		else 
		{
			
			echo '<div class="un_suggested_items">Sorry, there was no result found.</div>';
		}
	}  
} 
?>