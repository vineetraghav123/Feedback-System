<?php
session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:admin-login");
	}
	$adminname=$_SESSION['adminname'];
ini_set('max_execution_time',1000);

$sqlflag=$branch=$error=$class=$sem="";


if(isset($_POST['submit']))//teachera_c1a
{
	include 'connect.php';
	$teacher=$_POST['teacher'];
	$branch=$_POST['branch'];
	$class=$_POST['class'];
	$sem=$_POST['sem'];
	if(empty($teacher) or empty($branch) or empty($class) or empty($sem))
	{
		$error="All fields required!";
	}else{
		
			
				
				$q="CREATE TABLE ".$teacher."(rno varchar(20),subject1 varchar(30),subject2 varchar(30),subject3 varchar(30),subject4 varchar(30),subject5 varchar(30),subject6 varchar(30),text varchar(200),fav varchar(50))";
				$q1="INSERT INTO faculty(user,password,branch,email) values('$teacher','$teacher','$branch','');";
				
				$q2="INSERT INTO class(user,branch,sem,class) values('$teacher','$branch','$sem','$class');";
		
				$c="SELECT * FROM faculty WHERE user='$teacher' and branch='$branch';";
				$cr=mysqli_query($conn,$c);
				if(mysqli_num_rows($cr)<=0)
				{
					mysqli_query($conn,$q1);
				}
		
				$c="SELECT * FROM class WHERE user='$teacher' and branch='$branch' and sem='$sem' and class='$class';";
				$cr=mysqli_query($conn,$c);
				if(mysqli_num_rows($cr)<=0)
				{
					mysqli_query($conn,$q2);
				}
		
				
				
			if(mysqli_query($conn,$q))
				{
					$error="Faculty added! <br>";
				}else{
					$error="Faculty details added.";
				}
	
	}
}

?>
<html>
<head>
	<title>Add faculty</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		   <link rel="stylesheet" href="menu.css" />
		<style>

			
				
	.err{
		color: red;
		font-size:20px;
		background-color: white;
		width:20%;
		align:center;
		
		text-align:center;
}
	
	
	
	input[type=text],[type=password],select {
    width: 200px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    
    font-size: 15px;
	text-align:center;
    background-color: white;
    
    padding: 5px 5px 5px 20px;
    
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
.acolor{
	text-decoration:none;
	color:white;
}

	
		</style>
	</head>

	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">

		<form method="post" action=""> 
		<div class ="heading">Add Faculty</div>
		<table>
			<tr><td><input type="text" name="teacher" value="" placeholder="teacher"></td>
			<td><select name="branch">
			<option value="">Branch</option>
			<option value="civil" <?php if($branch=="civil"){echo "selected";}?>>Civil</option>
						<option value="mechanical" <?php if($branch=="mechanical"){echo "selected";}?>>Mechanical</option>
						<option value="computer_science" <?php if($branch=="computer_science"){echo "selected";}?>>Computer Science</option>
						<option value="electrical_and_electronics" <?php if($branch=="electrical and electronics"){echo "selected";}?>>Electrical and Electronics</option>
						<option value="electronics_and_communication" <?php if($branch=="electronics and communication"){echo "selected";}?>>Electronics and Communication</option>
						
			</select></td>
		<td><select name="class">
			<option value="">class</option>
			
			<option value="CSE-A" <?php if($class=="CSE-A"){echo "selected";}?>>CSE-A</option>
			<option value="CSE-B" <?php if($class=="CSE-B"){echo "selected";}?>>CSE-B</option>
			<option value="MECH-A" <?php if($class=="MECH-A"){echo "selected";}?>>MECH-A</option>
			<option value="ECE-A" <?php if($class=="ECE-A"){echo "selected";}?>>ECE-A</option>
			<option value="EEE-A" <?php if($class=="EEE-A"){echo "selected";}?>>EEE-A</option>
			<option value="CIVIL-A" <?php if($class=="CIVIL-A"){echo "selected";}?>>CIVIL-A</option>
			</select></td>
			
			<td><select name="sem">
			<option value="">sem</option>
			<option value="1st" <?php if($sem=="1st"){echo "selected";}?>>1</option>
			<option value="3rd" <?php if($sem=="3rd"){echo "selected";}?>>3</option>
			<option value="5th" <?php if($sem=="5th"){echo "selected";}?>>5</option>
			<option value="7th" <?php if($sem=="7th"){echo "selected";}?>>7</option>
			</select></td>
			<td><input type="submit" name="submit"></td>
			</table>
		</form>
		<div class="err"><?php echo $error;?></div>
		</div>
	</body>
</html>

