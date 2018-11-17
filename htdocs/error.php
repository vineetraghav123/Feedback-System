<?php
if(!$_REQUEST['error'])
{
	header("location:login");
}


?>
<html>

	<head>
		<style>
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
		.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}

.button3:hover {
    background-color: #f44336;
    color: white;
}
			.error{
				border: 10px solid red;
				padding: 20px 5px;
				width: 50%;
				
				margin: 20px;
				border-radius: 20px;
				color: red;
				font-size:20px;
			}
		</style>
	</head>
	<body>
		<center><img src="error.png" height="150" width="150"></center>
		<center><div class="error">Server Error!!!</div></center>
		<center>
			<a href="login" class="button button2">Login</a>
			<a href="form1" class="button button3">Register</a>
			
		</center>
	</body>
</html>