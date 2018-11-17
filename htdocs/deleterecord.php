<?php
session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:admin-login");
	}$adminname=$_SESSION['adminname'];
	ini_set('max_execution_time',1000);
$error=$checkbox="";
$tcount=$qcount=0;
$sqlflag=$branch=$sem=$class=$teacher_a=$teacher_b=$teacher_c=$teacher_d=$teacher_e=$teacher_f=$teacher_g=$teacher_h=$teacher_i=$teacher_j="";
if(isset($_REQUEST['drno']))
{
	include 'connect.php';
	$search=$_GET['drno'];
	
	$s="SELECT * FROM student WHERE rno='".$search."';";
		$res1=mysqli_query($conn,$s);
		$res1row=mysqli_fetch_array($res1);
		$branch=$res1row['branch'];
		$class=$res1row['class'];
		$sem=$res1row['sem'];
		include 'teacherselect.php';
	if($teacher_a!=""){$tcount++;}if($teacher_b!=""){$tcount++;}if($teacher_c!=""){$tcount++;}if($teacher_d!=""){$tcount++;}if($teacher_e!=""){$tcount++;}if($teacher_f!=""){$tcount++;}if($teacher_g!=""){$tcount++;}if($teacher_h!=""){$tcount++;}if($teacher_i!=""){$tcount++;}if($teacher_j!=""){$tcount++;}
	
			$q="DELETE FROM student WHERE rno='".$search."';";
			$q1="DELETE FROM ".$teacher_a." WHERE rno='".$search."';";
			$q2="DELETE FROM ".$teacher_b." WHERE rno='".$search."';";
			$q3="DELETE FROM ".$teacher_c." WHERE rno='".$search."';";
			$q4="DELETE FROM ".$teacher_d." WHERE rno='".$search."';";
			$q5="DELETE FROM ".$teacher_e." WHERE rno='".$search."';";
			$q6="DELETE FROM ".$teacher_f." WHERE rno='".$search."';";
			$q7="DELETE FROM ".$teacher_g." WHERE rno='".$search."';";
			$q8="DELETE FROM ".$teacher_h." WHERE rno='".$search."';";
			$q9="DELETE FROM ".$teacher_i." WHERE rno='".$search."';";
		   $q10="DELETE FROM ".$teacher_j." WHERE rno='".$search."';";
			//for debuggin:echo $q."<br>".$q1."<br>".$q2."<br>".$q3."<br>".$q4."<br>".$q5."<br>".$q6;
			
			//$sresult=mysqli_query($conn,$s);
		
		if(mysqli_query($conn,$q))
		{
			$qcount++;
		}
	if($teacher_a!="")
	{
		if(mysqli_query($conn,$q1))
		{
			$qcount++;
		}
	}
	if($teacher_b!="")
	{
		if(mysqli_query($conn,$q2))
		{
			$qcount++;
		}
	}
	if($teacher_c!="")
	{
		if(mysqli_query($conn,$q3))
		{
			$qcount++;
		}
	}
	if($teacher_d!="")
	{
		if(mysqli_query($conn,$q4))
		{
			$qcount++;
		}
	}
	if($teacher_e!="")
	{
		if(mysqli_query($conn,$q5))
		{
			$qcount++;
		}
	}
	if($teacher_f!="")
	{
		if(mysqli_query($conn,$q6))
		{
			$qcount++;
		}
	}
	if($teacher_g!="")
	{
		if(mysqli_query($conn,$q7))
		{
			$qcount++;
		}
	}
	if($teacher_h!="")
	{
		if(mysqli_query($conn,$q8))
		{
			$qcount++;
		}
	}
	if($teacher_i!="")
	{
		if(mysqli_query($conn,$q9))
		{
			$qcount++;
		}
	}
	if($teacher_j!="")
	{
		if(mysqli_query($conn,$q10))
		{
			$qcount++;
		}
	}
	
					if($qcount==$tcount+1)
					{
						$error="Record Deleted Successfully!";
					}/*else{
					$rollback="rollback;";
					mysqli_query($conn,$rollback);
					$commit="commit";
					mysqli_query($conn,$commit);
					$error="Error in Deleting Record With Registration No: ".$search.".";}*/
				
}

if(isset($_POST['deleteselected'])){
	include 'connect.php';
	if( isset($_POST['std'])){
	$checkbox=$_POST['std'];
	}
	if($checkbox==""){
		$error="Select Students. ";
	}else
	foreach($checkbox as $c){
		
		
	$search=$c;
	
	$s="SELECT * FROM student WHERE rno='".$search."';";
		$res1=mysqli_query($conn,$s);
		$res1row=mysqli_fetch_array($res1);
		$branch=$res1row['branch'];
		$class=$res1row['class'];
		$sem=$res1row['sem'];
		include 'teacherselect.php';
	if($teacher_a!=""){$tcount++;}if($teacher_b!=""){$tcount++;}if($teacher_c!=""){$tcount++;}if($teacher_d!=""){$tcount++;}if($teacher_e!=""){$tcount++;}if($teacher_f!=""){$tcount++;}if($teacher_g!=""){$tcount++;}if($teacher_h!=""){$tcount++;}if($teacher_i!=""){$tcount++;}if($teacher_j!=""){$tcount++;}
	
			$q="DELETE FROM student WHERE rno='".$search."';";
			$q1="DELETE FROM ".$teacher_a." WHERE rno='".$search."';";
			$q2="DELETE FROM ".$teacher_b." WHERE rno='".$search."';";
			$q3="DELETE FROM ".$teacher_c." WHERE rno='".$search."';";
			$q4="DELETE FROM ".$teacher_d." WHERE rno='".$search."';";
			$q5="DELETE FROM ".$teacher_e." WHERE rno='".$search."';";
			$q6="DELETE FROM ".$teacher_f." WHERE rno='".$search."';";
			$q7="DELETE FROM ".$teacher_g." WHERE rno='".$search."';";
			$q8="DELETE FROM ".$teacher_h." WHERE rno='".$search."';";
			$q9="DELETE FROM ".$teacher_i." WHERE rno='".$search."';";
		   $q10="DELETE FROM ".$teacher_j." WHERE rno='".$search."';";
			//for debuggin:echo $q."<br>".$q1."<br>".$q2."<br>".$q3."<br>".$q4."<br>".$q5."<br>".$q6;
			
			//$sresult=mysqli_query($conn,$s);
		
		if(mysqli_query($conn,$q))
		{
			$qcount++;
		}
	if($teacher_a!="")
	{
		if(mysqli_query($conn,$q1))
		{
			$qcount++;
		}
	}
	if($teacher_b!="")
	{
		if(mysqli_query($conn,$q2))
		{
			$qcount++;
		}
	}
	if($teacher_c!="")
	{
		if(mysqli_query($conn,$q3))
		{
			$qcount++;
		}
	}
	if($teacher_d!="")
	{
		if(mysqli_query($conn,$q4))
		{
			$qcount++;
		}
	}
	if($teacher_e!="")
	{
		if(mysqli_query($conn,$q5))
		{
			$qcount++;
		}
	}
	if($teacher_f!="")
	{
		if(mysqli_query($conn,$q6))
		{
			$qcount++;
		}
	}
	if($teacher_g!="")
	{
		if(mysqli_query($conn,$q7))
		{
			$qcount++;
		}
	}
	if($teacher_h!="")
	{
		if(mysqli_query($conn,$q8))
		{
			$qcount++;
		}
	}
	if($teacher_i!="")
	{
		if(mysqli_query($conn,$q9))
		{
			$qcount++;
		}
	}
	if($teacher_j!="")
	{
		if(mysqli_query($conn,$q10))
		{
			$qcount++;
		}
	}
	
					if($qcount==$tcount+1)
					{
						$error="Record Deleted Successfully!";
					}/*else{
					$rollback="rollback;";
					mysqli_query($conn,$rollback);
					$commit="commit";
					mysqli_query($conn,$commit);
					$error="Error in Deleting Record With Registration No: ".$search.".";}*/
				
		
	}
}
?>



<html>
	<head>
	<title>Delete Student</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		   <link rel="stylesheet" href="menu.css" />
	<script>
	
		function deleterc(){
			var rno = arguments[0];
			//var name="n"+rno;
			var sname=document.getElementById(rno).innerHTML;
			sname=sname.toUpperCase();			
			var del=confirm("Are you sure, you want to delete the record of "+sname);
			if(del==true)
			{
				window.location.href ="student-delete?drno="+rno;
			}
			
		}
		function toggle(source) {
  checkboxes = document.getElementsByName('std[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
function fun(){
	var items=document.getElementsByName('std[]');
		var selectedItems="";
		for(var i=0; i<items.length; i++){
			if(items[i].type=='checkbox' && items[i].checked==true){
				var rno=items[i].value;
				var student=document.getElementById(rno).innerHTML;
				student=student.toUpperCase();
				selectedItems+=student+",";
			}
		}
		
	var x=confirm("Are you sure, you want to delete the record of "+selectedItems+" ?");
	if(x==true){
		//return true;
	}else
		return false;
}

	</script>
	
		<style>
		
		
				
	.err{
		color: red;
		font-size:20px;
		background-color: white;
		width:30%;
		align:center;
		
		text-align:center;
}
	
	.name{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:5px 0px 5px 42px;
		
		width:26%;
		
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

input[type=text]:hover{
	background-color: #f5f5dc;
	border-color: red;
}
	input[type=submit], input[type=reset] {
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
    color:White;
	
	cursor: pointer;
}
.delete:hover{
	background-color:red;
	
	 color:white;
}
		</style>
	</head>
	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">

		<form method="post" action="">
				<div class ="heading">Delete Student Record</div>
				<input type="text" name="search" placeholder="Enter Name/Registration No." value="<?php if(isset($_POST['submit'])){echo $_POST['search'];}?>">
				<input type="submit" name="submit" value="Search">
			
		</form>
		<form method="post" action="" onsubmit="return fun()">
		
	<?php
			if(isset($_POST['submit']))
{
		$search=$_POST['search'];
		if(empty($search))
		{
			$error="Enter Student's Registration No.";
		}else{
			
			/*$conn=mysqli_connect.php("localhost","id817189_root","vineet","id817189_raghav");
			if(!$conn)
			{
				echo "connect.phpion error".mysqli_connect.php_error();
			}*/
			include 'connect.php';
			$select="SELECT * FROM student WHERE sname like '%$search%' or rno='$search';";
			$selectr=mysqli_query($conn,$select);
			if(mysqli_num_rows($selectr)>0)
			{	echo "<input type='submit' name='deleteselected' value='Delete Selected' />";
				echo "<table align='center' border='1'>";
				echo "<th>Select All<input type='checkbox' onclick='toggle(this)'></th><th>Student Name</th><th>Father Name</th><th>Registration no</th><th>Email</th><th>Branch</th><th>Class</th><th>Semester</th><th>Gender</th><th>Status</th><th>Delete</th></tr>";
				while($row=mysqli_fetch_assoc($selectr))
				{	
					echo "<tr align='center'><td><input type='checkbox' name='std[]' value='".$row['rno']."'></td><td id='".$row['rno']."'>".$row['sname']."</td><td>".$row['fname']."</td><td>".$row['rno']."</td><td>".
					$row['email']."</td><td>".$row['branch']."</td><td>".$row['class']."</td><td>".$row['sem']."</td><td>".$row['gender']."</td><td>".$row['status']."</td><td class='delete'><a class='acolor' onclick='deleterc(".$row['rno'].")'>Delete</a></td></tr>";
				}
				echo "</table>";
			}else{$error="Record Not Found";}
		
		}
		
}

?>
</form>
	<div class="err"><?php echo $error;?></div>
	</div>
	</body>
</html>