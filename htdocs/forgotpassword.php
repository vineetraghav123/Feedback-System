<?php
session_start();
//session_destroy();
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
$sqlflag=$err="";
$flag="true";
if(isset($_POST['submit']))
{	include 'connect.php';
	$userid=$_POST['userid'];
	if(empty($userid))
	{
		$err="Enter  Username";
	}else{
		if(isset($_GET['f']))
		{
			$q="SELECT email FROM faculty WHERE user='$userid';";
			if($result=mysqli_query($conn,$q))
			{
				if(mysqli_num_rows($result)<1)
				{
					$err="Enter correct Username";
				}else{
					$row=mysqli_fetch_assoc($result);
					$email=$row['email'];
					$code=generateRandomString();
					$_SESSION['user']=$userid;
					$_SESSION['reset']=$code;
					
					$to=$email;
					$txt="Your verification code is: ".$code;
					$subject="verification code";
					
					$from="no-reply";
					$tmp="From: Kiit <".$from."> \r\n";
					$headers=$tmp;
					
					mail($to,$subject,$txt,$headers);
					
				}
			}else{echo "SERVER ERROR!!!";}
		}elseif(isset($_GET['a']))
		{
			$q="SELECT email FROM admin WHERE user='$userid';";
			if($result=mysqli_query($conn,$q))
			{
				if(mysqli_num_rows($result)<1)
				{
					$err="Enter correct Username";
				}else{
					$row=mysqli_fetch_assoc($result);
					$email=$row['email'];
					$code=generateRandomString();
					$_SESSION['user']=$userid;
					$_SESSION['reset']=$code;
					
					$to=$email;
					$txt="Your verification code is: ".$code;
					$subject="verification code";
					
					$from="no-reply";
					$tmp="From: Kiit <".$from."> \r\n";
					$headers=$tmp;
					
					mail($to,$subject,$txt,$headers);
					
				}
			}else{echo "SERVER ERROR!!!";}
		}
		
	}	
}
if(isset($_POST['resetsubmit']))
{
	
	$code=$_POST['code'];
	$newp=$_POST['newp'];
	$newpagain=$_POST['newpagain'];
	if(empty($code) or empty($newp) or empty($newpagain))
	{
		$err="All Fields Required!!";
		$flag="false";
	}else{
		if($code!=$_SESSION['reset'])
		{
				$err="Code Mismatch,Try Again.";
				$flag="false";
		}
		if($newp!=$newpagain)
		{
			$err="Password mismatch,both password should be same.";
			$flag="false";
		}
	}
	if($flag=="true")
	{
		include 'connect.php';
		$user=$_SESSION['user'];
		if(isset($_GET['f']))
		{
			$q1="UPDATE faculty SET password='$newp' WHERE user='$user';";
			if(mysqli_query($conn,$q1))
			{
				session_destroy();
				header("location:faculty-login?updtsuccess");
			}
		}elseif(isset($_GET['a']))
		{
			$q1="UPDATE admin SET password='$newp' WHERE user='$user';";
			if(mysqli_query($conn,$q1))
			{
				session_destroy();
				header("location:admin-login?updtsuccess");
			}
		}
		
	}
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	<title>Forgot Password</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		<style>
	
	.err{
	color: red;
	 font-size:20px;
	background-color: white;
	width:100%;
	 text-align:center;
	
}
	body{
		background-image:url(pics/heidi.jpg);
		background-attachment: fixed;
background-repeat: no-repeat;
	}
	.name{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:5px;
	
		
	}
	input[type=text],[type=password],select {
    width: 280px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
  
    font-size: 15px;
	text-align:center;
    background-color: white;
    
    padding: 5px 5px 5px 20px;
    
}
[type=password]:hover{
	background-color: #f5f5dc;
	border-color: red;
}
input[type=text]:hover{
	background-color: #f5f5dc;
	border-color: red;
}
	input[type=button], input[type=submit], input[type=reset] {
    background-color: red;
    border: none;
	
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
input[type=submit]:hover{
	background-color: #cc0000;
	font-color: white;
}
input[type=button]:hover{
	background-color: #cc0000;
	font-color: white;
}

	.button{
		width: 176px;
	height: 48px;
    box-sizing: border-box;
    border: 2px solid #ccc;
  
    font-size: 15px;
	text-align:center;
    background-color: white;
    
    padding: 5px 5px 5px 20px;
 
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
   
    cursor: pointer;
}
	.button:hover{
	
		background-color:green;
	}
		.marg{
			margin:150px;
			
		}
	
	.adminbutton{
		text-decoration:none;
		margin:10px;
		height:7px;
		font-size:18px;
		
    font-size: 20px;
	text-align:center;
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 14px 50px;
	}.adminbutton:hover{background-color:green;}
	</style>
	</head>
	
	<body><br>
	<p align="right"><a href="home" class="adminbutton">Home</a></p>
	<?php
		if(isset($_SESSION['reset']))
		{
			echo "<div class='marg'>
			<form method='post'>
			<table align='center'>
				<tr>
					<td><font color='black'><h3>Verification code has been send to your registered email address.<br>(Email may be in your Spam folder)</h3></font></td>
				</tr>
				<tr>
					<td><input type='text' name='code' placeholder='Enter Code'/></td>
				</tr>
				<tr>
					<td><input type='password' name='newp' placeholder='Enter New Password'/></td>
				</tr>
				<tr>
					<td><input type='password' name='newpagain' placeholder='Enter Password Again'/></td>
				</tr>
				<tr>
					<td><input type='submit' name='resetsubmit'  /></td>
				</tr>
				<tr><td ><div class='err'>$err</div></td></tr>
			</table>
			</form>
			</div>
			
			";
		}elseif(!isset($_SESSION['reset']))
		{
			echo "<div class='marg'>
			<form method='post'>
			<table align='center'>
			<tr>
				<td><font color='black'><h3>Enter Your Username.</h3></font></td>
			</tr>
				<tr>
					<td><input type='text' name='userid' placeholder='username' /></td>
					
				</tr>
				<tr>
					<td><input type='submit' name='submit' /></td>
				</tr>
				<tr><td ><div class='err'>$err</div></td></tr>
					
				
			</table>
			
			</form>
			
		</div>";
		}
	?></body>
</html>