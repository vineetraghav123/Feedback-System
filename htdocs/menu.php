<?php
session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:admin-login");
	}
	$adminname=$_SESSION['adminname'];
?>
<!DOCTYPE html>
<head>
<title>Menu</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
	<style>
	.button {
    background-color: #4CAF50; /* Green */
   width:93%;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 2px 0px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button:hover{
	background-color:red;
}
	body{
		background-image:url(pics/heidi.jpg);
		background-attachment: fixed;
background-repeat: no-repeat;
	}
	.abc {
    background-color:white;
	border: 3px solid red;
    color: white;
    
    padding: 4px;
	font-size:20px;
	
	}
	.admin{
		color:red;
	}

	</style></head>

	<body>

<center><img src="pics/admin.png" height="80" width="80"></center>
			<center><div class="abc"><font color="red">Admin:<?php echo " ".$adminname;?></font></div></center>
	
		<a href="student-info" target="right" class="button">Student's info.</a>
		<a href="student-search" target="right" class="button">Student Search</a>
		<a href="student-delete" target="right" class="button">Delete Record</a>
		<a href="teacher-info" target="right" class="button">Faculty info.</a>
		<a href="teacher-search" target="right" class="button">Faculty Search</a>
		<a href="add-faculty" target="right" class="button">Add Faculty</a>
		<a href="teacher-delete" target="right" class="button">Delete Faculty</a>
		<a href="addemail?a" target="right" class="button">Add Email</a>
		<a href="change-password" target="right" class="button">Change Password</a>
		<a href="admin-home" target="_parent" class="button">Refresh</a>
		<a href="logout" target="_parent" class="button">Logout</a>
		
		
	


	</body>
	</html>