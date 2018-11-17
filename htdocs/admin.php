<?php 
session_start();
	if(!isset($_SESSION['adminname']))
	{	
		header("location:admin-login");
	}

$adminname=$_SESSION['adminname'];

	

?>
<html>
	<head>
	<style type="text/css">
	.admin{
		padding-bottom:3%;
		background-color:white;
		opacity:0.7;
		color:red;
		font-size:40px;
		text-align:center;
	}
	</style>
	<title>Student Info</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		    <link rel="stylesheet" href="menu.css">

	
	
		

	</head>
	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">
<img src="pics/slide1.jpg" alt="" width="100%" height="30%"/>
<div class="admin">

	<marquee>KIIT College Of Engineering.</marquee>
	
</div>
	</div>
	</body>
	

	
	
	
</html>