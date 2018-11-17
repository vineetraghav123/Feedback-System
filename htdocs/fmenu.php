<?php
session_start();
	if(!isset($_SESSION['facultyname']))
	{
		header("location:faculty-login");
	}
	$adminname=$_SESSION['facultyname'];
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
			<center><div class="abc"><font color="red"><?php echo " ".$adminname;?></font></div></center>
	
		
		
		
		<a href="faculty-feedback?number" target="right" class="button">Feedback</a>
		
		<a href="faculty-feedback?total" target="right" class="button">Total</a>
		<a href="faculty-changepassword" target="right" class="button">Change Password</a>
		<a href="addemail?f" target="right" class="button">Add Email</a>
		<a href="pdfdownload" target="right" class="button">Download PDF</a>
		<a href="faculty-home" target="_parent" class="button">Refresh</a>
		<a href="logout?faculty" target="_parent" class="button">Logout</a>
		
		
	


	</body>
	</html>