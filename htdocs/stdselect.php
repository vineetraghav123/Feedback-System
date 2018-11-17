<?php 
session_start();
	if(!isset($_SESSION['adminname']))
	{	
		header("location:admin-login");
	}
$error=$q="";
$sqlflag=$semester=$class=$branch="";
$adminname=$_SESSION['adminname'];

	if(isset($_POST['submit']))
	{
		include 'connect.php';
		$branch=$_POST['branch'];
		$class=$_POST['class'];
		$semester=$_POST['semester'];
	}

?>
<html>
	<head>
	<title>Student Info</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		    <link rel="stylesheet" href="menu.css">
	<script>
		function list(val)
			{
				
			
					if(window.XMLHttpRequest)
					{
						req=new XMLHttpRequest();
					}else
					{
						req=new ActiveXObject("Microsoft.XMLHTTP");
					}
					req.onreadystatechange=function()
					{
						if(req.readyState==4&&req.status==200)
						{
							document.getElementById("a").innerHTML=req.responseText;
						}
					};
					req.open("GET","class.php?branch="+val,true);
					req.send();
					
			}
			
	</script>
	
	
		<style>
		





select {
    width: 200px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    
    font-size: 15px;
	text-transform: capitalize;
    background-color: white;
    padding: 5px 5px 5px 20px;
    
}
select:hover{
	background-color: #f5f5dc;
	border-color: red;
	
}
input[type=button], input[type=submit]{
    background-color: red;
    border: none;
	
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}input[type=button], input[type=submit]{
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
.heading{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #4CAF50;
		background-color: #4CAF50;
		color: white;
		padding:6px 15px 6px 42px;
		
		width:100%;
		text-align:center;
		margin:0px 0px 5px 0px;
		
	}
	body {
    margin: 0;
}


		</style>
	</head>
	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">
	<form method="post" action="">
	<div class ="heading">Student's Information</div>
		<table>
		<tr> 
			<td>
					<select  name="branch" onchange="list(this.value)" >
						<option value="">Branch</option>
						<option value="all" >All</option>
						<option value="civil">Civil</option>
						<option value="mechanical">Mechanical</option>
						<option value="computer_science">Computer Science</option>
						<option value="electrical_and_electronics">Electrical and Electronics</option>
						<option value="electronics_and_communication">Electronics and Communication</option>
					</select>
			</td>
			
			<td>
					<select  name="semester">
						<option value="">Semester</option>
						<option value="all" >All</option>
						<option value="1st" >First</option>
						<option value="3rd" >Third</option>
						<option value="5th" >Fifth</option>
						<option value="7th" >Seventh</option>
					</select>
			</td>
			
			
			
			<td id="a">
					<select name="class">
						<option value="">Class(select branch first)</option>
						
					</select>
			</td>
			
			
			
			
		
					<td><input type="submit" name="submit"></td></tr>
		
		
		</table>
	</form>
	
	</body>
	
<?php
if(isset($_POST['submit']))
{	 if(empty($branch))
	{$error="Select Branch!";}
	else{
			if($branch=="all")
			{
				$q="SELECT * FROM student";
			}elseif($branch=="mechanical" or $branch=="computer_science" or $branch=="electronics_and_communication"  or $branch=="electrical_and_electronics" or $branch=="civil")
			{
				if($semester=="all" or $semester=="")
				{																	
					$q="SELECT * FROM student WHERE branch='".$branch."';";
				}elseif($semester=="1st" or $semester=="3rd" or $semester=="5th" or $semester=="7th")
				{
					if($class=="")
					{
						$q="SELECT * FROM student WHERE branch='".$branch."' and sem='".$semester."';";
					}
					if($class=="CSE-A" or $class=="CSE-B" or $class=="MECH-A" or $class=="EEE-A"or $class=="ECE-A" or $class=="CIVIL-A")
					{
						$q="SELECT * FROM student WHERE branch='".$branch."' and sem='".$semester."' and class='".$class."'	;";
					}
				}
			}
			
			
			
			$result=mysqli_query($conn,$q);
			$num=mysqli_num_rows($result);
			if($num>0)
			{
				echo "<table border='1' >";
				echo "<caption>"."Student's Details"."</caption>";
				echo "<th>Student Name</th><th>Father Name</th><th>Registration no</th><th>Email</th><th>Branch</th><th>Class</th><th>Semester</th><th>Gender</th><th>Password</th><th>Status</th>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr align='center'><td>".$row['sname']."</td><td>".$row['fname']."</td><td>".$row['rno']."</td><td>".
					$row['email']."</td><td>".$row['branch']."</td><td>".$row['class']."</td><td>".$row['sem']."</td><td>".$row['gender']."</td><td>".$row['password']."</td><td>".$row['status']."</td></tr>";
				}
				echo "</table>";
			}else
				$error="0 Result.";
	


	}
}
	
	
	
?>
	
	
	<div style="color: red;
		font-size:20px;
		background-color: white;
		width:20%;
		align:center;
		
		text-align:center;"><?php echo $error;?></div>
	</div>
</html>