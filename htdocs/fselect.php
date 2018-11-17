<?php 
session_start();
	if(!isset($_SESSION['facultyname']))
	{
		header("location:faculty-login");
	}	$facultyname=$_SESSION['facultyname'];
$sqlflag="";
include 'connect.php';
	

?>

<html>
	<head>
	<title>Feedbacks</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
			<link rel="stylesheet" href="menu.css" />
		
	<style>
		


		.caption{
			background-color:#FF5400;
	border:2px solid #FF5400;
	font-size:20px;
		}
			


		</style>
		
	</head>
	<body>
	<?php include 'facultynavbar.php';?>
<div style="margin-left:16%;">

	<?php
		$teacher=$_SESSION['facultyname'];
		if(isset($_GET['number']))
		{
			echo "<div class ='heading'>Student's Information</div>";
			$q="SELECT * FROM ".$teacher.";";
			if($result=mysqli_query($conn,$q))
				{
					if(mysqli_num_rows($result)>0)
					{
						echo "<table border='1'>";
						echo "<caption class='caption'>".$teacher."</caption>";
						echo "<tr><th>Semester</th><th>Punctuality in the Class</th><th>Regularity in taking Classes</th><th>Completes syllabus in time</th><th>Conducting the classroom discussions	</th><th>Teaching the subject matter</th><th>Student's participation in the class</th><th>Remark</th></tr>";
							
						while($row=mysqli_fetch_assoc($result))
						{	$q1="SELECT class,sem from student WHERE rno='".$row['rno']."';";
							$result1=mysqli_query($conn,$q1);
							$row1=mysqli_fetch_assoc($result1);
							echo "<tr><th>".$row1['sem']."</th><td>".$row['subject1']."</td><td>".$row['subject2']."</td><td>".$row['subject3']."</td><td>".$row['subject4']."</td><td>".$row['subject5']."</td><td>".$row['subject6']."</td><td>".$row['text']."</td></tr>";
						}
						echo "</table>";
					}	
				}
			
		}elseif(isset($_GET['total']))
		{
			echo "<div class ='heading'>Total</div>";
			$qc="SELECT count(rno) FROM ".$teacher.";";
				$s1="SELECT sum(subject1) FROM ".$teacher.";";
				$s2="SELECT sum(subject2) FROM ".$teacher.";";
				$s3="SELECT sum(subject3) FROM ".$teacher.";";
				$s4="SELECT sum(subject4) FROM ".$teacher.";";
				$s5="SELECT sum(subject5) FROM ".$teacher.";";
				$s6="SELECT sum(subject6) FROM ".$teacher.";";
				$s7="SELECT sum(fav) FROM ".$teacher.";";
				
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
						
		}
		
	
	?>
	


	<div class="err"></div>
	<div id="d"></div>
	</div>
	</body>
	</html>