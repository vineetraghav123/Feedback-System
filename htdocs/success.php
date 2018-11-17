<?php
	//$sucess="";
	session_start();
	if(!isset($_SESSION['sname']))
	{
		header("location:student-login");//$sucess="you have sucessfully registered";
	}
	

?>
<html>
	<head>
	<title>Registered</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		<style>
		body{
		background-image:url(pics/heidi.jpg);
				background-attachment: fixed;
background-repeat: no-repeat;
	}
		.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
		.success{
			border: 3px solid green;
			
			margin: 20px 20px;
			background-color: #4fca00;
			padding:25px;
			font-size: 20px;
			color:white;
			width: 50%;
			
		}
		.userid{
			border: 2px solid red;
			
			margin: 5px;
			background-color: white;
			padding:10px;
			font-size: 20px;
			color:red;
			width: 50%;
			
		}
		.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid red;

}

.button2:hover {
    background-color: red;
    color: white;
}




		</style>
	</head>
	<body>
		
		<center><img src="pics/success.png" height="150" width="150"></center>
		<center><div class="success">You Have Successfully Registered!!!.</div></center>
		
		<center>
			<a href="student-login" class="button button2">Login</a>
			
			
		</center>
	</body>

</html>