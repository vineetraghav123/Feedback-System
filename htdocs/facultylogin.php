<?php
	session_start();
	$error=$uname="";
	$sqlflag="";
	if(isset($_SESSION['facultyname'])){
		header("location:faculty-home");
	}
	if(isset($_REQUEST['error']))
	{
		$error="Incorrect UserId or Password";
	}
	if(isset($_POST['submit']))
	{
		$uname=$_POST['uname'];
		$upass=$_POST['upass'];
	include 'connect.php';
	
		$q="SELECT * FROM faculty where user='".$uname."';";
		if(mysqli_query($conn,$q))
		{
			$result=mysqli_query($conn,$q);
			$num=mysqli_num_rows($result);
			if($num>0)
			{
				$row=mysqli_fetch_assoc($result);
				$password=$row['password'];
				//$branch=$row['branch'];
				//$adminname=$uname;
				if($upass==$password)
				{
					$_SESSION['facultyname']=$uname;
					$_SESSION['branch']=$row['branch'];
					header("location:faculty-home?success");
				}
				else{ $error="Incorrect UserId or Password";}
			}
			else
			{
				$error="Incorrect UserId or Password";
			}
		}
		else{ $error="Server error.Try again after some time.";}
	}
?>

<html>
	<head>
	<title>Faculty Login</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		<style>
	
	.err{
	color: red;
	 font-size:20px;
	background-color: white;
	width:23%;
	 
	 align:center;
	 
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
    align:center;
    padding: 5px 5px 5px 20px;
    
}
[type=password]:hover{
	background-color: #f5f5dc;
	border-color: #4CAF50;;
}
input[type=text]:hover{
	background-color: #f5f5dc;
	border-color: #4CAF50;;
}
input[type=text]:focus{
	background-color: white;
  width: 300px;
 
}
input[type=password]:focus{
	background-color: white;
  width: 300px;
 
}
	input[type=button], input[type=submit], input[type=reset] {
    background-color: red;
    border: none;
	 width: 280px;
    color: white;
    padding: 11px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	font-size:20;
}
input[type=submit]:hover{
	background-color: #cc0000;
	font-color: white;
	 width: 300px;
}
input[type=button]:hover{
	background-color: #cc0000;
	font-color: white;
}

	.button{
		width: 176px;
	height: 48px;
     
   background-color: #4CAF50; /* Green */
    
    color: white;
   
    text-align: center;
    text-decoration: none;
   
    font-size: 16px;
   padding: 16px;
   
    cursor: pointer;
   
 }
	
	.button:hover{
	
		background-color:green;
	}
		.marg{
			margin:40px;
			background-color:#FBFCFE;
			width:30%;
			opacity: 0.8;
			
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
.success{
	color: green;
	 font-size:20px;
	background-color: #b2fe9a;
	
	width:30%;
	 
	 align:center;
	 
}

	</style>

	</head><br>
	<p align="right"><a href="home" class="adminbutton">Home</a></p>
	<body><center><div class="marg">
		<form action="" method="post">
			
			<table align="center">
			
			<tr><td align="center"><h3><font color="black">Faculty Login</font></h3></td></tr>
				
				<tr align="center"><td><input type="text" name="uname" maxlength="15" placeholder="Username"></td></tr><br>
				<tr align="center"><td><input type="password" name="upass" maxlength="15" placeholder="Password"></td></tr><br>
				<tr align="center"><td  align="center"><input type="submit" name="submit" value="Login"></td></tr>
			<tr><td align="center"><a href="resetpassword?a"  >Forgot Password</a></td></tr>
			
			</table>
		</form>
			</div></center>
			
			<center><div class="err"><?php echo $error; ?></div></center>
			<center><div class="success"><?php if(isset($_GET['updtsuccess'])){echo "Password Successfully Changed.";}?></div></center>
	
			</body>
</html>
