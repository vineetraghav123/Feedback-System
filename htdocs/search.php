<?php 
session_start();
	if(!isset($_SESSION['adminname']))
	{
	
		header("location:admin-login");
	}$adminname=$_SESSION['adminname'];
$error="";
$sqlflag="";
$teacher_a=$teacher_b=$teacher_c=$teacher_d=$teacher_e=$teacher_f=$teacher_g=$teacher_h=$teacher_i=$teacher_j="";
$n1=$n2=$n3=$n4=$n5=$n6=$n7=$n8=$n9=$n10=1;
?>
<html>
	<head>
	<title>Student Search</title>
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

	.view{
		
	
   
    font-size: 15px;
	text-align:center;
    background-color: #4CAF50; /* Green #4CAF50*/
    color:#4CAF50;
	
	cursor: pointer;
}
.view:hover{
	background-color:green;
	
	 color:red;
}

		</style>
	</head>
	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">
		<form method="post" action="">
		<div class ="heading">Search Student Record</div>
		<table><tr>
				
				<td><input type="text" placeholder="Enter Name/Reg.No" name="search" value="<?php if(isset($_POST['submit'])){echo $_POST['search'];}?>"></td>
				
				<td>
					<select  name="branch" onchange="list(this.value)" >
						<option value="">Branch</option>
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
					
						<option value="1st" >FIrst</option>
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

				
				
				
				
				<td><input type="submit" name="submit" value="Search"></td>
				
		</tr></table>
		</form>
		<?php

	
if(isset($_POST['submit']))
{
	
	include 'connect.php';
	$search=$_POST['search'];
	$branch=$_POST['branch'];
	$class=$_POST['class'];
	$sem=$_POST['semester'];
	if(empty($search))
	{
		$error="Field required";
	}else
	{
		if($branch=="")
		{
			$q="SELECT * FROM student WHERE sname like '%$search%' or rno='$search';";
		}elseif(!empty($branch) and $class=="" and $sem=="")
		{
			$q="SELECT * FROM student WHERE (sname like '%$search%' or rno='$search') AND branch='$branch';";
		}elseif(!empty($branch) and !empty($class) and $sem=="")
		{
			$q="SELECT * FROM student WHERE (sname like '%$search%' or rno='$search') AND branch='$branch' AND class='$class';";
		}elseif(!empty($branch) and !empty($class) and !empty($sem))
		{
			$q="SELECT * FROM student WHERE (sname like '%$search%' or rno='$search') AND branch='$branch' AND class='$class' AND sem='$sem';";
		}
		elseif(!empty($branch)  and !empty($sem))
		{
			$q="SELECT * FROM student WHERE (sname like '%$search%' or rno='$search') AND branch='$branch'  AND sem='$sem';";
		}
		$result=mysqli_query($conn,$q);
		
		if(mysqli_num_rows($result)>0)
		{
			echo "<table align='center' border='1'>";
				echo "<th>Student Name</th><th>Father Name</th><th>Registration no</th><th>Email</th><th>Branch</th><th>Class</th><th>Semester</th><th>Gender</th><th>View</th></tr>";
				while($row=mysqli_fetch_assoc($result))
				{	
					echo "<tr align='center'><td>".$row['sname']."</td><td>".$row['fname']."</td><td>".$row['rno']."</td><td>".
					$row['email']."</td><td>".$row['branch']."</td><td>".$row['class']."</td><td>".$row['sem']."</td><td>".$row['gender']."</td>"; 
					if($row['status']=="f"){ echo "<td class='view'><a href='search.php?srno=".$row['rno']."' class='acolor'>View</a></td>";}else{echo "<td style='background-color:red;color:white;'>Not Filled</td>";}
					echo "</tr>";
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
				echo "<th>Student Name</th><th>Father Name</th><th>Registration no</th><th>Email</th><th>Branch</th><th>Class</th><th>Semester</th><th>Gender</th><th>Status</th>";
				
				
					
					echo "<tr align='center'><td>".$row['sname']."</td><td>".$row['fname']."</td><td>".$row['rno']."</td><td>".
					$row['email']."</td><td>".$row['branch']."</td><td>".$row['class']."</td><td>".$row['sem']."</td><td>".$row['gender']."</td><td>".$row['status']."</td></tr>";
				
				echo "</table><br>";
				//$rno=$search;
				
				//$q="SELECT * FROM student WHERE sname='".$search."' OR rno='".$search."';";
				
				
			include 'teacherselect.php';
				
				$q1="SELECT * FROM ".$teacher_a." WHERE rno='".$rno."';";
				$q2="SELECT * FROM ".$teacher_b." WHERE rno='".$rno."';";
				$q3="SELECT * FROM ".$teacher_c." WHERE rno='".$rno."';";
				$q4="SELECT * FROM ".$teacher_d." WHERE rno='".$rno."';";
				$q5="SELECT * FROM ".$teacher_e." WHERE rno='".$rno."';";
				$q6="SELECT * FROM ".$teacher_f." WHERE rno='".$rno."';";
				$q7="SELECT * FROM ".$teacher_g." WHERE rno='".$rno."';";
				$q8="SELECT * FROM ".$teacher_h." WHERE rno='".$rno."';";
				$q9="SELECT * FROM ".$teacher_i." WHERE rno='".$rno."';";
			   $q10="SELECT * FROM ".$teacher_j." WHERE rno='".$rno."';";
			
				if($teacher_a!=""){$r1=mysqli_query($conn,$q1);}
				if($teacher_b!=""){$r2=mysqli_query($conn,$q2);}
				if($teacher_c!=""){$r3=mysqli_query($conn,$q3);}
				if($teacher_d!=""){$r4=mysqli_query($conn,$q4);}
				if($teacher_e!=""){$r5=mysqli_query($conn,$q5);}
				if($teacher_f!=""){$r6=mysqli_query($conn,$q6);}
				if($teacher_g!=""){$r7=mysqli_query($conn,$q7);}
				if($teacher_h!=""){$r8=mysqli_query($conn,$q8);}
				if($teacher_i!=""){$r9=mysqli_query($conn,$q9);}
				if($teacher_j!=""){$r10=mysqli_query($conn,$q10);}
				
				if($teacher_a!=""){$n1=mysqli_num_rows($r1);}
				if($teacher_b!=""){$n2=mysqli_num_rows($r2);}
				if($teacher_c!=""){$n3=mysqli_num_rows($r3);}
				if($teacher_d!=""){$n4=mysqli_num_rows($r4);}
				if($teacher_e!=""){$n5=mysqli_num_rows($r5);}
				if($teacher_f!=""){$n6=mysqli_num_rows($r6);}
				if($teacher_g!=""){$n7=mysqli_num_rows($r7);}
				if($teacher_h!=""){$n8=mysqli_num_rows($r8);}
				if($teacher_i!=""){$n9=mysqli_num_rows($r9);}
				if($teacher_j!=""){$n10=mysqli_num_rows($r10);}
				
				//echo $n1,$n2,$n3,$n4,$n5,$n6;
				
				
					if($teacher_a!=""){$row1=mysqli_fetch_assoc($r1);}
					if($teacher_b!=""){$row2=mysqli_fetch_assoc($r2);}
					if($teacher_c!=""){$row3=mysqli_fetch_assoc($r3);}
					if($teacher_d!=""){$row4=mysqli_fetch_assoc($r4);}
					if($teacher_e!=""){$row5=mysqli_fetch_assoc($r5);}
					if($teacher_f!=""){$row6=mysqli_fetch_assoc($r6);}
					if($teacher_g!=""){$row7=mysqli_fetch_assoc($r7);}
					if($teacher_h!=""){$row8=mysqli_fetch_assoc($r8);}
					if($teacher_i!=""){$row9=mysqli_fetch_assoc($r9);}
					if($teacher_j!=""){$row10=mysqli_fetch_assoc($r10);}
				
			
					echo "<table border='1' align='center'>";
						echo	"<tr><th>Subject</th>";if($teacher_a!=""){echo "<th>$teacher_a</th>";} if($teacher_b!=""){echo "<th>$teacher_b</th>";} if($teacher_c!=""){echo "<th>$teacher_c</th>";} if($teacher_d!=""){echo "<th>$teacher_d</th>";} if($teacher_e!=""){echo "<th>$teacher_e</th>";} if($teacher_f!=""){echo "<th>$teacher_f</th>";} if($teacher_g!=""){echo "<th>$teacher_g</th>";} if($teacher_h!=""){echo "<th>$teacher_h</th>";} if($teacher_i!=""){echo "<th>$teacher_i</th>";} if($teacher_j!=""){echo "<th>$teacher_j</th>";} echo "</tr>";
						echo	"<tr><th>Punctuality in the Class</th>";     		if($teacher_a!=""){echo "<td>".$row1['subject1']."</td>";} if($teacher_b!=""){echo "<td>".$row2['subject1']."</td>";} if($teacher_c!=""){echo "<td>".$row3['subject1']."</td>";} if($teacher_d!=""){echo "<td>".$row4['subject1']."</td>";} if($teacher_e!=""){echo "<td>".$row5['subject1']."</td>";} if($teacher_f!=""){echo "<td>".$row6['subject1']."</td>";} if($teacher_g!=""){echo "<td>".$row7['subject1']."</td>";} if($teacher_h!=""){echo "<td>".$row8['subject1']."</td>";} if($teacher_i!=""){echo "<td>".$row9['subject1']."</td>";} if($teacher_j!=""){echo "<td>".$row10['subject1']."</td>";}  echo "</tr>";
						echo	"<tr><th>Regularity in taking Classes</th>"; 		if($teacher_a!=""){echo "<td>".$row1['subject2']."</td>";} if($teacher_b!=""){echo "<td>".$row2['subject2']."</td>";} if($teacher_c!=""){echo "<td>".$row3['subject2']."</td>";} if($teacher_d!=""){echo "<td>".$row4['subject2']."</td>";} if($teacher_e!=""){echo "<td>".$row5['subject2']."</td>";} if($teacher_f!=""){echo "<td>".$row6['subject2']."</td>";} if($teacher_g!=""){echo "<td>".$row7['subject2']."</td>";} if($teacher_h!=""){echo "<td>".$row8['subject2']."</td>";} if($teacher_i!=""){echo "<td>".$row9['subject2']."</td>";} if($teacher_j!=""){echo "<td>".$row10['subject2']."</td>";} 	echo "</tr>";
						echo	"<tr><th>Completes syllabus in time</th>";  	    if($teacher_a!=""){echo "<td>".$row1['subject3']."</td>";} if($teacher_b!=""){echo "<td>".$row2['subject3']."</td>";} if($teacher_c!=""){echo "<td>".$row3['subject3']."</td>";} if($teacher_d!=""){echo "<td>".$row4['subject3']."</td>";} if($teacher_e!=""){echo "<td>".$row5['subject3']."</td>";} if($teacher_f!=""){echo "<td>".$row6['subject3']."</td>";} if($teacher_g!=""){echo "<td>".$row7['subject3']."</td>";} if($teacher_h!=""){echo "<td>".$row8['subject3']."</td>";} if($teacher_i!=""){echo "<td>".$row9['subject3']."</td>";} if($teacher_j!=""){echo "<td>".$row10['subject3']."</td>";} 	echo "</tr>"; 
					   echo	"<tr><th>Conducting the classroom discussions</th>";	if($teacher_a!=""){echo "<td>".$row1['subject4']."</td>";} if($teacher_b!=""){echo "<td>".$row2['subject4']."</td>";} if($teacher_c!=""){echo "<td>".$row3['subject4']."</td>";} if($teacher_d!=""){echo "<td>".$row4['subject4']."</td>";} if($teacher_e!=""){echo "<td>".$row5['subject4']."</td>";} if($teacher_f!=""){echo "<td>".$row6['subject4']."</td>";} if($teacher_g!=""){echo "<td>".$row7['subject4']."</td>";} if($teacher_h!=""){echo "<td>".$row8['subject4']."</td>";} if($teacher_i!=""){echo "<td>".$row9['subject4']."</td>";} if($teacher_j!=""){echo "<td>".$row10['subject4']."</td>";} 	echo "</tr>";
						echo	"<tr><th>Teaching the subject matter</th>";			if($teacher_a!=""){echo "<td>".$row1['subject5']."</td>";} if($teacher_b!=""){echo "<td>".$row2['subject5']."</td>";} if($teacher_c!=""){echo "<td>".$row3['subject5']."</td>";} if($teacher_d!=""){echo "<td>".$row4['subject5']."</td>";} if($teacher_e!=""){echo "<td>".$row5['subject5']."</td>";} if($teacher_f!=""){echo "<td>".$row6['subject5']."</td>";} if($teacher_g!=""){echo "<td>".$row7['subject5']."</td>";} if($teacher_h!=""){echo "<td>".$row8['subject5']."</td>";} if($teacher_i!=""){echo "<td>".$row9['subject5']."</td>";} if($teacher_j!=""){echo "<td>".$row10['subject5']."</td>";} 	echo "</tr>";
					   echo	"<tr><th>Student's participation in the class</th>";	if($teacher_a!=""){echo "<td>".$row1['subject6']."</td>";} if($teacher_b!=""){echo "<td>".$row2['subject6']."</td>";} if($teacher_c!=""){echo "<td>".$row3['subject6']."</td>";} if($teacher_d!=""){echo "<td>".$row4['subject6']."</td>";} if($teacher_e!=""){echo "<td>".$row5['subject6']."</td>";} if($teacher_f!=""){echo "<td>".$row6['subject6']."</td>";} if($teacher_g!=""){echo "<td>".$row7['subject6']."</td>";} if($teacher_h!=""){echo "<td>".$row8['subject6']."</td>";} if($teacher_i!=""){echo "<td>".$row9['subject6']."</td>";} if($teacher_j!=""){echo "<td>".$row10['subject6']."</td>";} 	echo "</tr>";
						
						echo	"<tr><th>Remark</th>";								if($teacher_a!=""){echo "<td>".$row1['text']."</td>";} if($teacher_b!=""){echo "<td>".$row2['text']."</td>";} if($teacher_c!=""){echo "<td>".$row3['text']."</td>";} if($teacher_d!=""){echo "<td>".$row4['text']."</td>";} if($teacher_e!=""){echo "<td>".$row5['text']."</td>";} if($teacher_f!=""){echo "<td>".$row6['text']."</td>";} if($teacher_g!=""){echo "<td>".$row7['text']."</td>";} if($teacher_h!=""){echo "<td>".$row8['text']."</td>";} if($teacher_i!=""){echo "<td>".$row9['text']."</td>";} if($teacher_j!=""){echo "<td>".$row10['text']."</td>";} 	echo "</tr>";			
					echo "</table>";
				
				
			
}
?>
		<div class="err"><?php echo $error;?></div>
		</div>
	</body>
</html>