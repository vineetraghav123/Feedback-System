<?php
session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:admin-login");
	}
	$adminname=$_SESSION['adminname'];
ini_set('max_execution_time',1000);
include 'connect.php';
$sqlflag=$teacher=$error="";
if(isset($_GET['fname']))
{
	$teacher=$_GET['fname'];
	$q="DROP TABLE $teacher;";
				$q1="DELETE FROM faculty WHERE user='".$teacher."';";
				$q2="DELETE FROM class WHERE user='".$teacher."';";
				mysqli_query($conn,$q);
				
		
			
			if(mysqli_query($conn,$q1) and mysqli_query($conn,$q2))
				{
					$error="Faculty Deleted!";
				}
	
}


?>
<html>
<head>
<title>Teacher Delete</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		   <link rel="stylesheet" href="menu.css" />
	
	<script>
	function deletefaculty(name){
			
			var del=confirm("Are you sure you want to delete the record of "+name);
			if(del==true)
			{
				window.location.href ="teacher-delete?fname="+name;
			}
			
		}
	</script>
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

	.delete{
		
	
   
    font-size: 15px;
	text-align:center;
    background-color: #4CAF50; /* Green #4CAF50*/
    color:#4CAF50;
	
	cursor: pointer;
}
.delete:hover{
	background-color:red;
	
	 color:red;
}

		</style>
	</head>
	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">

		<form method="post" action=""> 
		<div class ="heading">Delete Faculty</div>
			<input type="text" name="teacher" value="<?php echo $teacher;?>" placeholder="Teacher Name">
		
			<input type="submit" name="submit">
		</form>
	</body>
	
	<?php
if(isset($_POST['submit']))
{
	
	
	$search=$_POST['teacher'];
	
	if(empty($search))
	{
		$error="Field required";
	}else
	{
		
		$q="SELECT * FROM faculty WHERE user like '%$search%' ;";
		$result=mysqli_query($conn,$q);
		
		if(mysqli_num_rows($result)>0)
		{
			echo "<table align='center' border='1'>";
				echo "<tr><th>Name</th><th>Branch</th><th>Delete</th></tr>";
				while($row=mysqli_fetch_assoc($result))
				{	
					echo "<tr align='center'><td>".$row['user']."</td><td>".$row['branch']."</td><td class='delete'><a class='acolor' onclick='deletefaculty(\"".$row['user']."\")' >Delete</a></td></tr>";
				}
				echo "</table><br>";
		}else{$error="Record Not Found";}
		
	}
	
}
	?>
	<div class="err"><?php echo $error; ?></div>
	</div>
</html>

