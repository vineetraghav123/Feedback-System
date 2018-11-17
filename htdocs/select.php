<?php 
$error="";
session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:adminlogin.php");
	}

?>
<html>
	<head>
		<style>
		.err{
		color: red;
		font-size:20px;
		background-color: white;
		width:10%;
		align:center;
		border-radius:8px;
		text-align:center;
}
		body{
		background-image:url(dc.jpg);
		background-attachment: fixed
	}
			table {
    border-collapse: collapse;
    width: 90%;
}

th, td ,caption{
	
    text-align: center;
    padding: 8px;
}

tr{background-color: #f2f2f2}/*:nth-child(even)*/

th,caption{
    background-color: #4CAF50;
    color: white;
}
			{
				border: 3px solid red;
				border-radius: 10px;

				color:red;
				padding:3px;
				font-size:20px;
		
			}
		</style>
	</head>
	<body>
		<?php
$conn=mysqli_connect("localhost","root","vineet","raghav");
	if(!$conn)
	{
		echo "connection_failed";
	}
	
	//include 'connection.php';
	$q="SELECT * FROM student";
	$result=mysqli_query($conn,$q);
	$num=mysqli_num_rows($result);
	if($num>0)
	{
		echo "<table border='1' align='center' >";
		echo "<caption>"."Student's Details"."</caption>";
		echo "<th>Student Name</th><th>Father Name</th><th>Registration no</th><th>Email</th><th>Class</th><th>Gender</th><th>Password</th><th>Status</th>";
		while($row=mysqli_fetch_assoc($result))
		{
			echo "<tr align='center'><td>".$row['sname']."</td><td>".$row['fname']."</td><td>".$row['rno']."</td><td>".
			$row['email']."</td><td>".$row['class']."</td><td>".$row['gender']."</td><td>".$row['password']."</td><td>".$row['status']."</td></tr>";
		}
		echo "</table>";
	}else
		$error="0 Result.";


?>
<div class="err"><?php echo $error;  ?></div>
	</body>
</html>

