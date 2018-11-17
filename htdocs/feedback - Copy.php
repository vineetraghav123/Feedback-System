<?php
session_start();
	if(!isset($_REQUEST['successfeedback']) or !isset($_SESSION['sname']) or !isset($_SESSION['rno']))
	{
		header("location:login.php");//$sucess="you have sucessfully registered";
	}
$row=$column=$valueerr=$errorbox=$sqlflag="";
$flag=1;
$rno=$sname="";
$sqlflag="";
$teacher_a=$teacher_b=$teacher_c=$teacher_d=$teacher_e=$teacher_f="";
$fav_a=$fav_b=$fav_c=$fav_d=$fav_e=$fav_f="";
if(isset($_SESSION['sname']) and isset($_SESSION['rno']))
{
	$sname=$_SESSION['sname'];
	$rno=$_SESSION['rno'];
	$branch=$_SESSION['branch'];
	$class=$_SESSION['class'];
	$sem=$_SESSION['sem'];
	include 'teacherselect.php';

}
else
{
	$rno="00";
}
if(isset($_POST['submit']))
{
	if(!empty($_POST['fav'])){
		foreach($_POST['fav'] as $fav){
		if($fav==$teacher_a)
	{$fav_a=1;}elseif($fav==$teacher_b)
		{$fav_b=1;}elseif($fav==$teacher_c)
			{$fav_c=1;}elseif($fav==$teacher_d)
				{$fav_d=1;}elseif($fav==$teacher_e)
					{$fav_e=1;}elseif($fav==$teacher_f)
						{$fav_f=1;}
		}
}
	
	$b=array
	(
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","","")
		
	);
	$e=array
	(
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","",""),
		array("","","","","","")
		
	);
	$r=array("","","","","","");
	for($i=0;$i<6;$i++)
	{
		for($j=0;$j<6;$j++)
		{
			$x=$i+1;
			$y=$j+1;
			
			$b[$i][$j]=$_POST["b"."$x"."$y"];					
		}
		$r[$i]=$_POST["r"."$i"];
	}
	for($i=0;$i<6;$i++)
	{
		for($j=0;$j<6;$j++)
		{
			
			
			if($b[$i][$j]>4 or $b[$i][$j]<0 or $b[$i][$j]=="")
			{
				$valueerr="Value should be 0-4.";
				$row=$i+1;
				$column=$j+1;
				//$errorbox=$row.$column;
				$e[$i][$j]=$row.$column;
				$flag=0;
				//break;
			}				
		}
	}
	/*$conn=mysqli_connect("localhost","id817189_root","vineet","id817189_raghav");
	
	if(!$conn)
	{
		header("location:error.php?error='error'");
	}else
	{$sqlflag=1;}*/
//sql strt
include 'connect.php';
if($flag==1 and $sqlflag==1)
{
	$q1="INSERT INTO ".$teacher_a." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][0].",".$b[1][0].",".$b[2][0].",".$b[3][0].",".$b[4][0].",".$b[5][0].",'".$r[0]."','".$fav_a."');";
	$q2="INSERT INTO ".$teacher_b." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][1].",".$b[1][1].",".$b[2][1].",".$b[3][1].",".$b[4][1].",".$b[5][1].",'".$r[1]."','".$fav_b."');";
	$q3="INSERT INTO ".$teacher_c." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][2].",".$b[1][2].",".$b[2][2].",".$b[3][2].",".$b[4][2].",".$b[5][2].",'".$r[2]."','".$fav_c."');";
	$q4="INSERT INTO ".$teacher_d." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][3].",".$b[1][3].",".$b[2][3].",".$b[3][3].",".$b[4][3].",".$b[5][3].",'".$r[3]."','".$fav_d."');";
	$q5="INSERT INTO ".$teacher_e." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][4].",".$b[1][4].",".$b[2][4].",".$b[3][4].",".$b[4][4].",".$b[5][4].",'".$r[4]."','".$fav_e."');";
	$q6="INSERT INTO ".$teacher_f." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][5].",".$b[1][5].",".$b[2][5].",".$b[3][5].",".$b[4][5].",".$b[5][5].",'".$r[5]."','".$fav_f."');";
	//echo $q1;
	if(mysqli_query($conn,$q1) and mysqli_query($conn,$q2) and mysqli_query($conn,$q3) and mysqli_query($conn,$q4) and mysqli_query($conn,$q5) and mysqli_query($conn,$q6))
	{
		$_SESSION['formfilled']="formfilled";
		header("location:feedbacksuccess.php");
	}
	else
	{echo "error".mysqli_error($conn); }
}


	
}
?>

<html>
	<head>
		<style>
		
			.err{
			color: red;
			font-size: 20px;
			border: 1px solid #5cb85c;
			background-color:white;
			width:50%;
			text-align:center;
			border-radius:5px;
			
			}
	form{
		text-align: center;
		align:center;
	}
	body{
		background-image:url(j.jpg);
		background-attachment: fixed;
	}
	th{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:9px;
		border-radius: 10px;
		text-transform:capitalize;
		
	}
	input[type=number],[type=text]{
		font-size: 15px;
    width: 150px;
	height: 50px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 10px;
    text-align:center;
	background-color:white;
    padding: 5px 5px 5px 20px;
    
}
select{
		font-size: 15px;
    width: 305px;
	height: 50px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 10px;
    text-align:center;
	background-color:white;
    padding: 5px 5px 5px 20px;
    
}

input[type=number]:hover{
	background-color: #f5f5dc;
	border-color: red;
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
	.name{
		
		border:2px solid red;
		border-radius: 10px;
	}

	
	.left{
		margin:5px 0px 2px 46px;
		font-size:20px;
		box-sizing: border-box;
		width:30%;
		background-color: red;
		color:white;
		text-align:center;
		border-radius:5px;
		text-transform:capitalize;
	}
	
	.adminbutton{
		text-decoration:none;
		margin:10px;
		height:7px;
		font-size:18px;
		border-radius: 50px;
    font-size: 20px;
	text-align:center;
    background-color:red; /* Green  #4CAF50*/
    color: white;
    padding: 14px 50px;
	}.adminbutton:hover{background-color:green;}
select:hover{
	background-color: #f5f5dc;
	border-color: red;
}
.fav{
	font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:9px;
		border-radius: 10px;
		text-transform:capitalize;
}
		</style>
	</head>
	<body>
						<div class="left"><?php echo "Hello, ".$sname; ?></div> <div class="left"><?php if($rno!=00){echo "Reg. No.: ".$rno;} ?></div>
	<br>
	
	<center><div class="err">
	
	<?php if(!empty($valueerr))
		{	
			echo $valueerr;
		}else{echo "Value should be 0-4.";}
		?>
	</div></center>
		<form method="post" action="">
			<table align="center">
				<tr><th>Subject</th><th><?php echo $teacher_a;?></th><th><?php echo $teacher_b;?></th><th><?php echo $teacher_c;?></th><th><?php echo $teacher_d;?></th><th><?php echo $teacher_e;?></th><th><?php echo $teacher_f;?></tr>
				<tr><th>Punctuality in the Class</th>	 			<td <?php if(isset($_POST['submit']) and $e[0][0]==11){echo "class='name'";}?>><input type="number" name="b11" value="<?php if(isset($_POST['submit'])){echo $b[0][0];}?>"></td><td <?php if(isset($_POST['submit']) and $e[0][1]==12){echo "class='name'";}?>><input type="number" name="b12" value="<?php if(isset($_POST['submit'])){echo $b[0][1];}?>"></td><td <?php if(isset($_POST['submit']) and $e[0][2]==13){echo "class='name'";}?>><input type="number" name="b13" value="<?php if(isset($_POST['submit'])){echo $b[0][2];}?>"></td><td <?php if(isset($_POST['submit']) and $e[0][3]==14){echo "class='name'";}?>><input type="number" name="b14" value="<?php if(isset($_POST['submit'])){echo $b[0][3];}?>"></td><td <?php if(isset($_POST['submit']) and $e[0][4]==15){echo "class='name'";}?>><input type="number" name="b15" value="<?php if(isset($_POST['submit'])){echo $b[0][4];}?>"></td><td <?php if(isset($_POST['submit']) and $e[0][5]==16){echo "class='name'";}?>><input type="number" name="b16" value="<?php if(isset($_POST['submit'])){echo $b[0][5];}?>"></td></tr>  
				<tr><th>Regularity in taking Classes</th>			<td <?php if(isset($_POST['submit']) and $e[1][0]==21){echo "class='name'";}?>><input type="number" name="b21" value="<?php if(isset($_POST['submit'])){echo $b[1][0];}?>"></td><td <?php if(isset($_POST['submit']) and $e[1][1]==22){echo "class='name'";}?>><input type="number" name="b22" value="<?php if(isset($_POST['submit'])){echo $b[1][1];}?>"></td><td <?php if(isset($_POST['submit']) and $e[1][2]==23){echo "class='name'";}?>><input type="number" name="b23" value="<?php if(isset($_POST['submit'])){echo $b[1][2];}?>"></td><td <?php if(isset($_POST['submit']) and $e[1][3]==24){echo "class='name'";}?>><input type="number" name="b24" value="<?php if(isset($_POST['submit'])){echo $b[1][3];}?>"></td><td <?php if(isset($_POST['submit']) and $e[1][4]==25){echo "class='name'";}?>><input type="number" name="b25" value="<?php if(isset($_POST['submit'])){echo $b[1][4];}?>"></td><td <?php if(isset($_POST['submit']) and $e[1][5]==26){echo "class='name'";}?>><input type="number" name="b26" value="<?php if(isset($_POST['submit'])){echo $b[1][5];}?>"></td></tr>
				<tr><th>Completes syllabus in time</th>				<td <?php if(isset($_POST['submit']) and $e[2][0]==31){echo "class='name'";}?>><input type="number" name="b31" value="<?php if(isset($_POST['submit'])){echo $b[2][0];}?>"></td><td <?php if(isset($_POST['submit']) and $e[2][1]==32){echo "class='name'";}?>><input type="number" name="b32" value="<?php if(isset($_POST['submit'])){echo $b[2][1];}?>"></td><td <?php if(isset($_POST['submit']) and $e[2][2]==33){echo "class='name'";}?>><input type="number" name="b33" value="<?php if(isset($_POST['submit'])){echo $b[2][2];}?>"></td><td <?php if(isset($_POST['submit']) and $e[2][3]==34){echo "class='name'";}?>><input type="number" name="b34" value="<?php if(isset($_POST['submit'])){echo $b[2][3];}?>"></td><td <?php if(isset($_POST['submit']) and $e[2][4]==35){echo "class='name'";}?>><input type="number" name="b35" value="<?php if(isset($_POST['submit'])){echo $b[2][4];}?>"></td><td <?php if(isset($_POST['submit']) and $e[2][5]==36){echo "class='name'";}?>><input type="number" name="b36" value="<?php if(isset($_POST['submit'])){echo $b[2][5];}?>"></td></tr>
				<tr><th>Conducting the classroom discussions</th>	<td <?php if(isset($_POST['submit']) and $e[3][0]==41){echo "class='name'";}?>><input type="number" name="b41" value="<?php if(isset($_POST['submit'])){echo $b[3][0];}?>"></td><td <?php if(isset($_POST['submit']) and $e[3][1]==42){echo "class='name'";}?>><input type="number" name="b42" value="<?php if(isset($_POST['submit'])){echo $b[3][1];}?>"></td><td <?php if(isset($_POST['submit']) and $e[3][2]==43){echo "class='name'";}?>><input type="number" name="b43" value="<?php if(isset($_POST['submit'])){echo $b[3][2];}?>"></td><td <?php if(isset($_POST['submit']) and $e[3][3]==44){echo "class='name'";}?>><input type="number" name="b44" value="<?php if(isset($_POST['submit'])){echo $b[3][3];}?>"></td><td <?php if(isset($_POST['submit']) and $e[3][4]==45){echo "class='name'";}?>><input type="number" name="b45" value="<?php if(isset($_POST['submit'])){echo $b[3][4];}?>"></td><td <?php if(isset($_POST['submit']) and $e[3][5]==46){echo "class='name'";}?>><input type="number" name="b46" value="<?php if(isset($_POST['submit'])){echo $b[3][5];}?>"></td></tr>  
				<tr><th>Teaching the subject matter</th>			<td <?php if(isset($_POST['submit']) and $e[4][0]==51){echo "class='name'";}?>><input type="number" name="b51" value="<?php if(isset($_POST['submit'])){echo $b[4][0];}?>"></td><td <?php if(isset($_POST['submit']) and $e[4][1]==52){echo "class='name'";}?>><input type="number" name="b52" value="<?php if(isset($_POST['submit'])){echo $b[4][1];}?>"></td><td <?php if(isset($_POST['submit']) and $e[4][2]==53){echo "class='name'";}?>><input type="number" name="b53" value="<?php if(isset($_POST['submit'])){echo $b[4][2];}?>"></td><td <?php if(isset($_POST['submit']) and $e[4][3]==54){echo "class='name'";}?>><input type="number" name="b54" value="<?php if(isset($_POST['submit'])){echo $b[4][3];}?>"></td><td <?php if(isset($_POST['submit']) and $e[4][4]==55){echo "class='name'";}?>><input type="number" name="b55" value="<?php if(isset($_POST['submit'])){echo $b[4][4];}?>"></td><td <?php if(isset($_POST['submit']) and $e[4][5]==56){echo "class='name'";}?>><input type="number" name="b56" value="<?php if(isset($_POST['submit'])){echo $b[4][5];}?>"></td></tr>
				<tr><th>Student's participation in the class</th>	<td <?php if(isset($_POST['submit']) and $e[5][0]==61){echo "class='name'";}?>><input type="number" name="b61" value="<?php if(isset($_POST['submit'])){echo $b[5][0];}?>"></td><td <?php if(isset($_POST['submit']) and $e[5][1]==62){echo "class='name'";}?>><input type="number" name="b62" value="<?php if(isset($_POST['submit'])){echo $b[5][1];}?>"></td><td <?php if(isset($_POST['submit']) and $e[5][2]==63){echo "class='name'";}?>><input type="number" name="b63" value="<?php if(isset($_POST['submit'])){echo $b[5][2];}?>"></td><td <?php if(isset($_POST['submit']) and $e[5][3]==64){echo "class='name'";}?>><input type="number" name="b64" value="<?php if(isset($_POST['submit'])){echo $b[5][3];}?>"></td><td <?php if(isset($_POST['submit']) and $e[5][4]==65){echo "class='name'";}?>><input type="number" name="b65" value="<?php if(isset($_POST['submit'])){echo $b[5][4];}?>"></td><td <?php if(isset($_POST['submit']) and $e[5][5]==66){echo "class='name'";}?>><input type="number" name="b66" value="<?php if(isset($_POST['submit'])){echo $b[5][5];}?>"></td></tr>
				<tr><th colspan="7"align="center">Enter feedback in text(100 characters),Optional.  </th></tr>
				<tr><th>Remark</th> <td><input type="text" name="r0" value="<?php if(isset($_POST['submit'])){echo $r[0];}?>" maxlength="150"></td><td><input type="text" name="r1" value="<?php if(isset($_POST['submit'])){echo $r[1];}?>" maxlength="150"></td><td><input type="text" name="r2" value="<?php if(isset($_POST['submit'])){echo $r[2];}?>" maxlength="150"></td><td><input type="text" name="r3" value="<?php if(isset($_POST['submit'])){echo $r[3];}?>" maxlength="150"></td><td><input type="text" name="r4" value="<?php if(isset($_POST['submit'])){echo $r[4];}?>" maxlength="150"></td><td><input type="text" name="r5" value="<?php if(isset($_POST['submit'])){echo $r[5];}?>" maxlength="150"></td>	</tr>						
				<tr><th>Favorite teacher:</th>
					<td class="fav"><input type="checkbox" name="fav[]" value="<?php echo $teacher_a;?>" <?php if(!empty($fav_a)){echo "checked";}?>>Yes</td>
					<td class="fav"><input type="checkbox" name="fav[]" value="<?php echo $teacher_b;?>" <?php if(!empty($fav_b)){echo "checked";}?>>Yes</td>
					<td class="fav"><input type="checkbox" name="fav[]" value="<?php echo $teacher_c;?>" <?php if(!empty($fav_c)){echo "checked";}?>>Yes</td>
					<td class="fav"><input type="checkbox" name="fav[]" value="<?php echo $teacher_d;?>" <?php if(!empty($fav_d)){echo "checked";}?>>Yes</td>
					<td class="fav"><input type="checkbox" name="fav[]" value="<?php echo $teacher_e;?>" <?php if(!empty($fav_e)){echo "checked";}?>>Yes</td>
					<td class="fav"><input type="checkbox" name="fav[]" value="<?php echo $teacher_f;?>" <?php if(!empty($fav_f)){echo "checked";}?>>Yes</td>
				</tr>
				<tr><td colspan="7" align="center"><input type="submit" name="submit" value="Submit"></td></tr>		
				
				
			</table>
		</form>
	</body>
</html>