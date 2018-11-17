<?php 
session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:admin-login");
	}$adminname=$_SESSION['adminname'];
$error="";
$sqlflag="";
$teacher_a=$branch="";

?>
<html>
	<head>
	<title>Teacher Search</title>
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
	
	.name{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:5px 0px 5px 10px;
		
		width:26%;
		
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

	.faculty{
		
	
   
    font-size: 15px;
	text-align:center;
    background-color: #4CAF50; /* Green #4CAF50*/
    color:#4CAF50;
	
	cursor: pointer;
}
.faculty:hover{
	background-color:green;
	
	 color:red;
}

		</style>
	</head>
	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">
		<form method="post" action="">
		<div class ="heading">Faculty Search</div>
		<table><tr>
				
				<td><input type="text" placeholder="Enter Faculty Name" name="search" value="<?php if(isset($_POST['submit'])){echo $_POST['search'];}?>">
				&nbsp<input type="submit" name="submit" value="Search"></td>
				
		</tr></table>
		</form>
		<?php

	
if(isset($_POST['submit']))
{
	
	include 'connect.php';
	$search=$_POST['search'];
	
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
				echo "<tr><th>Name</th><th>Branch</th><th>View</th></tr>";
				while($row=mysqli_fetch_assoc($result))
				{	
					echo "<tr align='center'><td>".$row['user']."</td><td>".$row['branch']."</td><td class='faculty'><a href='teacher-search?fname=".$row['user']."' class='acolor'>View</a></td></tr>";
				}
				echo "</table><br>";
		}else{$error="Record Not Found";}
		
	}
	
}
if(isset($_GET['fname']))
{
	$search=$_GET['fname'];
	include 'connect.php';
	$q1="SELECT * FROM ".$search.";";
			$result1=mysqli_query($conn,$q1);
		
			if(mysqli_num_rows($result1)>0)
			
			{
				echo "<table align='center' border='1' >";
				echo "<caption>".$search."</caption>";
				
						echo	"<tr><th>Punctuality in the Class</th><th>Regularity in taking Classes</th><th>Completes syllabus in time</th><th>Conducting the classroom discussions</th><th>Teaching the subject matter</th><th>Student's participation in the class</th><th>Remark</th></tr>";
						while($row1=mysqli_fetch_assoc($result1))
						{	
							echo	"<tr><td>".$row1['subject1']."</td><td>".$row1['subject2']."</td><td>".$row1['subject3']."</td><td>".$row1['subject4']."</td><td>".$row1['subject5']."</td><td>".$row1['subject6']."</td><td>".$row1['text']."</td></tr>";
						}		
					echo "</table>";
				
				
				$qc="SELECT count(rno) FROM ".$search.";";
				$s1="SELECT sum(subject1) FROM ".$search.";";
				$s2="SELECT sum(subject2) FROM ".$search.";";
				$s3="SELECT sum(subject3) FROM ".$search.";";
				$s4="SELECT sum(subject4) FROM ".$search.";";
				$s5="SELECT sum(subject5) FROM ".$search.";";
				$s6="SELECT sum(subject6) FROM ".$search.";";
				$s7="SELECT sum(fav) FROM ".$search.";";
				
				$result=mysqli_query($conn,$qc);
				$r1=mysqli_query($conn,$s1);
				$r2=mysqli_query($conn,$s2);
				$r3=mysqli_query($conn,$s3);
				$r4=mysqli_query($conn,$s4);
				$r5=mysqli_query($conn,$s5);
				$r6=mysqli_query($conn,$s6);
				$r7=mysqli_query($conn,$s7);
				
				
					$row=mysqli_fetch_assoc($result);
					$row1=mysqli_fetch_assoc($r1);
					$row2=mysqli_fetch_assoc($r2);
					$row3=mysqli_fetch_assoc($r3);
					$row4=mysqli_fetch_assoc($r4);
					$row5=mysqli_fetch_assoc($r5);
					$row6=mysqli_fetch_assoc($r6);
					$row7=mysqli_fetch_assoc($r7);
						$fp=$row['count(rno)']*4;
						
						echo "<br><table border='1'>";
						echo "<div class ='heading'>Total</div>";
							echo "<caption>Feedback Points Obtained from: ".$fp."</caption>";
							echo "<tr><th>Total Feedback</th><th>Punctuality in the Class</th><th>Regularity in taking Classes</th><th>Completes syllabus in time</th><th>Conducting the classroom discussions</th><th>Teaching the subject matter</th><th>Student's participation in the class</th></tr>";
							echo "<tr><th>".$row['count(rno)']."</th><td>".$row1['sum(subject1)']."</td><td>".$row2['sum(subject2)']."</td><td>".$row3['sum(subject3)']."</td><td>".$row4['sum(subject4)']."</td><td>".$row5['sum(subject5)']."</td><td>".$row6['sum(subject6)']."</td></tr>";
						echo "</table>";
						$total=$fp*6;
						$obtained=$row1['sum(subject1)']+$row2['sum(subject2)']+$row3['sum(subject3)']+$row4['sum(subject4)']+$row5['sum(subject5)']+$row6['sum(subject6)'];
						
						echo "<br><table border='1'>";
						echo "<tr><th>Total: </th><td>".$total."</td></tr>";
						echo "<tr><th>Obtained: </th><td>".$obtained."</td></tr>";
						echo "</table>";
						
						echo "<br><table border='1'>";
						echo "<tr><th class='heading fav'>".$row7['sum(fav)']."  Student selected you as their favorite teacher.</th></tr>";
						echo "</table>";
			}else{$error="Empty!!";}	
			
			
}
?>
		<div class="err"><?php echo $error;?></div>
		</div>
	</body>
</html>