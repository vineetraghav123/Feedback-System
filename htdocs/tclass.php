<?php

	
	session_start();
	$teacher_a=$teacher_b=$teacher_c=$teacher_d=$teacher_e=$teacher_f=$teacher_g=$teacher_h=$teacher_i=$teacher_j="";
	include 'connect.php';
		if(isset($_GET['branch']))
		{	$branch=$_GET['branch'];
			$_SESSION['branch']=$branch;
			
				echo "<select id='semester'  name='semester' onchange='classselect(this.value)'>";
				echo	"<option value=''>Semester</option>";
				echo	"<option value='1st'>First</option>";
				echo	"<option value='3rd'>Third</option>";
				echo	"<option value='5th'>Fifth</option>";
				echo	"<option value='7th'>Seventh</option>";
				echo "</select>";
				
		}
		if(isset($_GET['semester']))
		{	
				$_SESSION['sem']=$_GET['semester'];
				$branch=$_SESSION['branch'];
				if($branch=="computer_science")
				{
					echo "<select id='class' name='class' onchange='teacherdd(this.value)'>";
					echo "<option value=''>Class</option>";
					echo "<option value='CSE-A'>CSE-A</option>";
					echo "<option value='CSE-B'>CSE-B</option>";
					echo "</select>";
					
				}else
				if($branch=="mechanical")
				{
					echo "<select id='class' name='class' onchange='teacherdd(this.value)'>";
					echo "<option value=''>Class</option>";
					echo "<option value='MECH-A'>MECH-A</option>";
					
					echo "</select>";
				}else
					if($branch=="electrical_and_electronics")
					{
						echo "<select name='class' onchange='teacherdd(this.value)'>";
					echo "<option value=''>Class</option>";
					echo "<option value='EEE-A'>EEE-A</option>";
					echo "</select>";
				}elseif($branch=="electronics_and_communication")
				{
					echo "<select name='class' onchange='teacherdd(this.value)'>";
					echo "<option value=''>Class</option>";
					echo "<option value='ECE-A'>ECE-A</option>";
					echo "</select>";
					
				}elseif($branch=="civil")
				{
					echo "<select name='class' onchange='teacherdd(this.value)'>";
					echo "<option value=''>Class</option>";
					echo "<option value='CIVIL-A'>CIVIL-A</option>";
					echo "</select>";
					
				}
		}
		
		if(isset($_GET['class']))
		{
			$class=$_GET['class'];
			$_SESSION['class']=$class;
			$branch=$_SESSION['branch'];
			$sem=$_SESSION['sem'];
			include 'teacherselect.php';
			
			echo "<select id='teacher' name='teacher' onchange='data(this.value)'>";
				echo 	"<option value=''>Teacher</option>";
				if($teacher_a!=""){echo 	"<option value='".$teacher_a."'>".$teacher_a."</option>";}
				if($teacher_b!=""){echo 	"<option value='".$teacher_b."'>".$teacher_b."</option>";}
				if($teacher_c!=""){echo 	"<option value='".$teacher_c."'>".$teacher_c."</option>";}
				if($teacher_d!=""){echo 	"<option value='".$teacher_d."'>".$teacher_d."</option>";}
				if($teacher_e!=""){echo 	"<option value='".$teacher_e."'>".$teacher_e."</option>";}
				if($teacher_f!=""){echo 	"<option value='".$teacher_f."'>".$teacher_f."</option>";}
				if($teacher_g!=""){echo 	"<option value='".$teacher_g."'>".$teacher_g."</option>";}
				if($teacher_h!=""){echo 	"<option value='".$teacher_h."'>".$teacher_h."</option>";}
				if($teacher_i!=""){echo 	"<option value='".$teacher_i."'>".$teacher_i."</option>";}
				if($teacher_j!=""){echo 	"<option value='".$teacher_j."'>".$teacher_j."</option>";}
			echo "</select>";
		}
		if(isset($_GET['data']))
		{
			$teacher=$_GET['data'];
			
			if($teacher!="")
			{	
		
				$q="SELECT * FROM ".$teacher.";";
				//echo $q;
				if($result=mysqli_query($conn,$q))
				{
					if(mysqli_num_rows($result)>0)
					{
						echo "<table border='1'>";
						echo "<caption class='capital'>".$teacher."</caption>";
						echo "<tr><th>Registeration No:</th><th>Punctuality in the Class</th><th>Regularity in taking Classes</th><th>Completes syllabus in time</th><th>Conducting the classroom discussions	</th><th>Teaching the subject matter</th><th>Student's participation in the class</th><th>Remark</th></tr>";
							
						while($row=mysqli_fetch_assoc($result))
						{
							echo "<tr><th>".$row['rno']."</th><td>".$row['subject1']."</td><td>".$row['subject2']."</td><td>".$row['subject3']."</td><td>".$row['subject4']."</td><td>".$row['subject5']."</td><td>".$row['subject6']."</td><td>".$row['text']."</td></tr>";
						}
						echo "</table>";
						
						$qc="SELECT count(rno) FROM ".$teacher;
				$s1="SELECT sum(subject1) FROM ".$teacher;
				$s2="SELECT sum(subject2) FROM ".$teacher;
				$s3="SELECT sum(subject3) FROM ".$teacher;
				$s4="SELECT sum(subject4) FROM ".$teacher;
				$s5="SELECT sum(subject5) FROM ".$teacher;
				$s6="SELECT sum(subject6) FROM ".$teacher;
				$s7="SELECT sum(fav) FROM ".$teacher;
				
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
						echo "<tr><th class='heading'>".$row7['sum(fav)']."  Student selected you as their favorite teacher.</th></tr>";
						echo "</table>";
						
					}else{echo "<div class='err'>Empty!!</div>";}
					
				}else{ echo "<div class='err'>Server Error!</div>";}
	
			}
		}
?>