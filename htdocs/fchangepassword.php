<?php
$error=$success="";
$sqlflag="";
session_start();
if(!isset($_SESSION['facultyname']))
{
	header("location:faculty-login");
}else{
	$facultyname=$_SESSION['facultyname'];
		if(isset($_POST['submit']))
		{
			$user=$_POST['user'];
			$oldp=$_POST['oldp'];
			$newp=$_POST['newp'];
			if(empty($user) or empty($oldp) or empty($newp))
			{
				$error="All fields Required!";
			}else{
					include 'connect.php';
					$sq="SELECT * FROM faculty WHERE user='".$user."';";
					$sr=mysqli_query($conn,$sq);
					if(mysqli_num_rows($sr)>0)
					{
						$srow=mysqli_fetch_assoc($sr);
						$oldpass=$srow['password'];
						if($oldp==$oldpass)
						{
							$uq="UPDATE faculty SET password='".$newp."' WHERE user='".$user."';";
							if(mysqli_query($conn,$uq))
							{
								$success="Password Successfully Changed For ".$user;
								$user="";
							}
							
						}else{$error="Enter Correct Password!";}
					}else{$error="No Faculty Found With Userid: ".$user;}
			}
		}
}
?>

<html>
	<head>
	<title>Change Password</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		   <link rel="stylesheet" href="menu.css" />
	<style>
	
	.err{
	color: red;
	 font-size:20px;
	background-color: white;
	
	width:50%;
	 
	 align:center;
	
}
.success{
	color: green;
	 font-size:20px;
	background-color: #b2fe9a;
	
	width:50%;
	 padding:0px;
	 align:center;
	
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

	
		
	
	</style>

	</head>
	<body>
	<?php include 'facultynavbar.php';?>
<div style="margin-left:16%;">
	<div class ='heading'>Change Password</div>
	
		<form method="post" action="">
		<?php     if(!empty($error)){
 echo "<center><div class='err'>".$error."</div></center>";   }
else{
   echo "<center><div class='success'>".$success."</div></center>";
}
  ?>
			<table align="center">
			
				<tr><td><input type="text" name="user" placeholder="Enter Username" value="<?php	if(isset($_POST['submit'])) {echo $user;}?>"></td></tr>
				<tr><td><input type="password" name="oldp" placeholder="Enter Old Password"></td></tr>
				<tr><td><input type="password" name="newp" placeholder="Enter New Password"></td></tr>
				<tr><td><input type="submit" name="submit" value="Update"></td></tr>
			</table>
		</form>
	
	</div></body>
</html>