<?php
session_start();
$error=$password=$sqlflag="";
include 'connect.php';

/*$q="SELECT * from visit;";
	$result=mysqli_query($conn,$q);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_assoc($result);
		$old=$row['hit'];
		$new=$old+1;
		$q="UPDATE visit SET hit='".$new."';";
		mysqli_query($conn,$q);
		mysqli_close($conn);
	}*/


if(isset($_REQUEST['error']))
{
	$error="Incorrect Registeration No or Password";
}
if(isset($_REQUEST['filled']))
{
	$sname=$_SESSION['sname'];
	$error="<div class='capital'>".$sname.",</div> Thanks,You have already given your feedback.";
}

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['submit']))
{
	include 'connect.php';
		$uname=input($_POST['uname']);
		$upass=$_POST['upass'];

	
	/*$conn=mysqli_connect.php("localhost","id817189_root","vineet","id817189_raghav");
	if(!$conn)
	{
		echo "error connect.phpion";
	}*/
	
	$q="SELECT password,sname,branch,sem,class,email,status FROM student WHERE rno='".$uname."';";
	if(mysqli_query($conn,$q))
	{
		$result=mysqli_query($conn,$q);
		$num=mysqli_num_rows($result);
		if($num>0)
		{	$row=mysqli_fetch_assoc($result);
			$password=$row['password'];
			$sname=$row['sname'];//
			$status=$row['status'];
			$branch=$row['branch'];
			$sem=$row['sem'];
			$class=$row['class'];
			$email=$row['email'];
			if($upass==$password and $status=="nf")
			{
				$_SESSION['sname']=$sname;
				$_SESSION['rno']=$uname;
				$_SESSION['branch']=$branch;
				$_SESSION['class']=$class;
				$_SESSION['sem']=$sem;
				if($email!="")
				{
					$_SESSION['email']=$email;
				}
			header("location:feedback-form?successfeedback='success'");
			}
			else
			if($upass==$password and $status=="f")
			{
				$_SESSION['sname']=$sname;
			header("location:student-login?filled=''");
			}
			else{header("location:student-login?error='incorrect Registeration No os password'");}
		}else
		{
			header("location:student-login?error='incorrect Registeration No os password1'");
		}
		
	}
	
	
}	



?>

<html>
	<head>
	<link rel="icon" type="image/gif/png" href="pics/logo.png">
	<title>Student Login</title>
		<style>
	.capital{
			text-transform: capitalize;
		}
	.err{
	color: red;
	 font-size:20px;
	background-color: white;
	width:35%;
	 
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
    width: 290px;
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
	input[type=submit], input[type=reset] {
    background-color: red;
    border: none;
	
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 6px 2px;
    cursor: pointer;
	height: 50px;
	
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
		
	text-decoration:none;
   
    font-size: 15px;
	text-align:center;
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 16px 73px;
    margin: 4px 2px;
    cursor: pointer;
	
	width: 20%;
	height: 45px;
	
 
	}
	
	.button:hover{
	
		background-color:green;
		
	}
		.marg{
			margin:40px;
			background-color:#FBFCFE;
			width:30%;
			opacity: 0.9;
			
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
	
	<body><br><p align="right"><a href="home" class="adminbutton">Home</a></p><center><div class="marg">
		<form action="" method="post">
			<table align="center"><h2>Student's Login</h2>
				<tr align="center"><td><input type="text" name="uname" maxlength="15" placeholder="Class Roll No."></td></tr><br>
				<tr align="center"><td><input type="password" name="upass" maxlength="15" placeholder="Password"></td></tr><br>
				<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Login"><a href="registration-form" class="button">Register</a></td></tr>
			</table>
		</form>
			
	</div><center><div class="err"><?php echo $error; ?></div></center></center>
	</body>
</html>