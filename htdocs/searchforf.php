<?php 
session_start();
	if(!isset($_SESSION['facultyname']))
	{
		header("location:facultylogin");
	}
$error="";
$sqlflag="";
$teacher_a=$branch="";

?>
<html>
	<head>
	
		<style>
		
			table {
    border-collapse: collapse;
    width: 100%;
}

th, td ,caption{
	
    text-align: center;
    padding: 5px;
	
}

tr{background-color: #f2f2f2}/*:nth-child(even)*/

th,caption{
    background-color: #4CAF50;
    color: white;
}
			
				
	.err{
		color: red;
		font-size:20px;
		background-color: white;
		width:20%;
		align:center;
		border-radius:8px;
		text-align:center;
}
	body{
		background-image:url(man.jpg);
		background-attachment: fixed
	}
	.name{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:5px 0px 5px 10px;
		border-radius: 10px;
		width:26%;
		
	}
	.heading{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid red;
		background-color: red;
		color: white;
		padding:5px 15px 5px 42px;
		border-radius: 10px;
		width:100%;
		text-align:center;
		margin:0px 0px 5px 0px;
		
	}
	input[type=text],[type=password],select {
    width: 200px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 10px;
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
	border-radius: 50px;
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

	.button{
		
	
   
    font-size: 15px;
	text-align:center;
    background-color: #4CAF50; /* Green #4CAF50*/
    color:#4CAF50;
	
	cursor: pointer;
}
.button:hover{
	background-color:green;
	
	 color:red;
}

		</style>
	</head>
	<body>
		<form method="post" action="">
		<div class ="heading">Search Student Record</div>
		<table><tr>
				
				<td><input type="text" placeholder="Enter Name/Reg.No" name="search" value="<?php if(isset($_POST['submit'])){echo $_POST['search'];}?>">
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
		$branch=$_SESSION['branch'];
		$q="SELECT * FROM student WHERE (sname like '%$search%' or rno='$search') AND branch='$branch';";
		$result=mysqli_query($conn,$q);
		
		if(mysqli_num_rows($result)>0)
		{
			echo "<table align='center' border='1'>";
				echo "<th>Student Name</th><th>Father Name</th><th>Registration no</th><th>Email</th><th>Branch</th><th>Class</th><th>Semester</th><th>Gender</th><th>Password</th><th>Status</th><th>Delete</th></tr>";
				while($row=mysqli_fetch_assoc($result))
				{	
					echo "<tr align='center'><td>".$row['sname']."</td><td>".$row['fname']."</td><td>".$row['rno']."</td><td>".
					$row['email']."</td><td>".$row['branch']."</td><td>".$row['class']."</td><td>".$row['sem']."</td><td>".$row['gender']."</td><td>".$row['password']."</td><td>".$row['status']."</td><td class='button'><a href='fsearch?srno=".$row['rno']."' class='acolor'>View</a></td></tr>";
				}
				echo "</table><br>";
		}else{$error="Record Not Found";}
		
	}
	
}
if(isset($_GET['srno']))
{
	$search=$_GET['srno'];
	include 'connect.php';
	$q="SELECT * FROM student WHERE rno='".$search."';";
			$result=mysqli_query($conn,$q);
			$row=mysqli_fetch_assoc($result);
			$rno=$row['rno'];
			$branch=$row['branch'];
			$class=$row['class'];
			$sem=$row['sem'];
			
			
				echo "<table align='center' border='1' >";
				echo "<caption>"."Student's Details"."</caption>";
				echo "<th>Student Name</th><th>Father Name</th><th>Registration no</th><th>Email</th><th>Branch</th><th>Class</th><th>Semester</th><th>Gender</th><th>Password</th><th>Status</th>";
				
				
					
					echo "<tr align='center'><td>".$row['sname']."</td><td>".$row['fname']."</td><td>".$row['rno']."</td><td>".
					$row['email']."</td><td>".$row['branch']."</td><td>".$row['class']."</td><td>".$row['sem']."</td><td>".$row['gender']."</td><td>".$row['password']."</td><td>".$row['status']."</td></tr>";
				
				echo "</table><br>";
				//$rno=$search;
				
				//$q="SELECT * FROM student WHERE sname='".$search."' OR rno='".$search."';";
				
				$teacher_a=$_SESSION['facultyname'];
			//include 'teacherselect';
				
				$q1="SELECT * FROM ".$teacher_a." WHERE rno='".$rno."';";
				
			
				$r1=mysqli_query($conn,$q1);
				
				
				$n1=mysqli_num_rows($r1);
				
				
				if($n1>0)
				{
					$row1=mysqli_fetch_assoc($r1);
					
				
			
					echo "<table border='1' align='center'>";
						echo	"<tr><th>Punctuality in the Class</th><th>Regularity in taking Classes</th><th>Completes syllabus in time</th><th>Conducting the classroom discussions</th><th>Teaching the subject matter</th><th>Student's participation in the class</th><th>Remark</th></tr>";
						echo	"<tr><td>".$row1['subject1']."</td><td>".$row1['subject2']."</td><td>".$row1['subject3']."</td><td>".$row1['subject4']."</td><td>".$row1['subject5']."</td><td>".$row1['subject6']."</td><td>".$row1['text']."</td></tr>";
								
					echo "</table>";
				}
				
			
}
?>
		<div class="err"><?php echo $error;?></div>
	</body>
</html>