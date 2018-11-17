<?php
session_start();
	if(!isset($_SESSION['facultyname']))
	{
		header("location:faculty-login");
	}
	$facultyname=$_SESSION['facultyname'];
?>
</html>
<html>
	<head>
	<title>Faculty Home</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
			<link rel="stylesheet" href="menu.css" />
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
	

	
	
		

	</head>
	<body>
	<?php include 'facultynavbar.php';?>
<div style="margin-left:16%;">
<img src="pics/slide1.jpg" alt="" width="100%" height="30%"/>

<div class="admin">

	<marquee>KIIT College Of Engineering.</marquee>
	
</div>
	</div>
	</body>
	

	
	