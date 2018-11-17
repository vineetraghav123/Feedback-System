<?php
	//$sucess="";
	$sqlflag="";
	session_start();
	if(!isset($_SESSION['formfilled']))
	{
		header("location:student-login");//$sucess="you have sucessfully registered";
	}else{
	$sname=$_SESSION['sname'];
	$rno=$_SESSION['rno'];
	
	include 'connect.php';
	$q="UPDATE student SET status= 'f' WHERE rno = '".$rno."';";
	mysqli_query($conn,$q);
	//session_unset();
	if(isset($_SESSION['email']))
	{	
		$email=$_SESSION['email'];
		$to=$email;
		$txt=$sname.", Thank You For Your Feedback!";
		$subject="Feedback";
		//$name=$sname;
		$from="no-reply";
		$tmp="From: Kiit <".$from."> \r\n";
		$headers=$tmp;
		
		mail($to,$subject,$txt,$headers);
		//echo $to." ".$txt." ".$subject." ".$headers;
		unset($_SESSION['email']);
	}
	unset($_SESSION['sname']);
	unset($_SESSION['rno']);
	unset($_SESSION['formfilled']);
	unset($_SESSION['branch']);
	unset($_SESSION['class']);
	unset($_SESSION['sem']);
	
	
}
?>
<html>
	<head>
	<title>Feedback-Success</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		<style>
		body{
		background-image:url(pics/d.jpg);
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
			padding:30px;
			font-size: 20px;
			color:white;
			width: 50%;
text-transform:capitalize;
			
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

.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}

.button3:hover {
    background-color: #f44336;
    color: white;
}


		</style>
	</head>
	<body>
		
		<center><img src="pics/success.png" height="150" width="150"></center>
		<center><div class="success"><?php echo $sname.", ";?>Thank You For Your Feedback!!!.</div></center>
		<center>
			<a href="registration-form" class="button button2">Register</a>
			
			
		</center>
	</body>

</html>