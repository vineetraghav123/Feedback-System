<?php
session_start();
if(!isset($_SESSION['facultyname']) and !isset($_SESSION['adminname']))
{
	header("location:home");
}
$adminname=$facultyname="";
if(isset($_SESSION['adminname'])){$adminname=$_SESSION['adminname'];}
if(isset($_SESSION['facultyname'])){$facultyname=$_SESSION['facultyname'];}
$sqlflag=$err=$success="";

if(isset($_POST['submit']))
{	include 'connect.php';
	$email=$_POST['email'];
	if(empty($email))
	{
		$err="Enter Email";
	}else{
		if(isset($_GET['f']))
		{
			
			$user=$_SESSION['facultyname'];
			$q="UPDATE faculty SET email='$email' WHERE user='$user';";
			if(mysqli_query($conn,$q))
			{
				$success="Successfully Added!";
			}else{echo "SERVER ERROR!!!";}
		}elseif(isset($_GET['a']))
		{
			
			$user=$_SESSION['adminname'];
			$q="UPDATE admin SET email='$email' WHERE user='$user';";
			if(mysqli_query($conn,$q))
			{
				$success="Successfully Added!";
			}else{echo "SERVER ERROR!!!";}
		}
		
	}	
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	<title>Add Email</title>
	 <link rel="icon" type="image/gif/png" href="pics/logo.png">	
		   <link rel="stylesheet" href="menu.css" />
		<style>
	
	.err{
	color: red;
	 font-size:20px;
	background-color: white;
	width:20%;
	 text-align:center;
	 
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

	
		.marg{
			margin:200px;
			
		}
	
	
	.success{
	color: green;
	 font-size:20px;
	background-color: #b2fe9a;
	
	width:20%;
	 
	 text-align:center;
	
}
	</style>
	</head>
	
	<body>
	<?php if(isset($_GET['a'])){include 'adminnavbar.php';}
	 if(isset($_GET['f'])){include 'facultynavbar.php';}
	?>
<div style="margin-left:16%;">

			<form method='post'>
			<div class ="heading">Add Email</div>
			<table align='center'>
			<tr>
				<td><font color='black'><h3>Enter Your Email. <br> it can be used to recover the password,if you forget.</h3></font></td>
			</tr>
				<tr>
					<td><input type='text' name='email' placeholder='Email' /></td>
					
				</tr>
				<tr>
					<td><input type='submit' name='submit' value="Add"/></td>
				</tr>
				
					
				
			</table>
			
			</form>
			
	<center><div class='err'><?php echo $err;?></div>
				<div class='success'><?php echo $success;?></div></center>
	</div>
	</body>
</html>