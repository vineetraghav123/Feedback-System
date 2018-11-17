<?php
session_start();
	if(!isset($_REQUEST['successfeedback']) or !isset($_SESSION['sname']) or !isset($_SESSION['rno']))
	{
		header("location:student-login");//$sucess="you have sucessfully registered";
	}
$row=$column=$valueerr=$errorbox=$sqlflag="";
$flag=1;
$remarkflag=1;
$rno=$sname="";
$sqlflag="";
$teacher_a=$teacher_b=$teacher_c=$teacher_d=$teacher_e=$teacher_f=$teacher_g=$teacher_h=$teacher_i=$teacher_j="";
$fav_a=$fav_b=$fav_c=$fav_d=$fav_e=$fav_f=$texterr="";
$tcount=$qcount=0;
include 'connect.php';
if(isset($_SESSION['sname']) and isset($_SESSION['rno']))
{
	$sname=$_SESSION['sname'];
	$rno=$_SESSION['rno'];
	$branch=$_SESSION['branch'];
	$class=$_SESSION['class'];
	$sem=$_SESSION['sem'];
	include 'teacherselect.php';
	if($teacher_a!=""){$tcount++;}if($teacher_b!=""){$tcount++;}if($teacher_c!=""){$tcount++;}if($teacher_d!=""){$tcount++;}if($teacher_e!=""){$tcount++;}if($teacher_f!=""){$tcount++;}if($teacher_g!=""){$tcount++;}if($teacher_h!=""){$tcount++;}if($teacher_i!=""){$tcount++;}if($teacher_j!=""){$tcount++;}
	
}
else
{
	$rno="00";
}

if(isset($_POST['submit']))
{
	$b=array
	(
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","","")
		
	);
	$e=array
	(
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","",""),
		array("","","","","","","","","","")
		
	);
	if($teacher_a!="")
	{
		$j=0;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_b!="")
	{
		$j=1;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_c!="")
	{
		$j=2;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_d!="")
	{
		$j=3;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_e!="")
	{
		$j=4;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_f!="")
	{
		$j=5;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_g!="")
	{
		$j=6;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_h!="")
	{
		$j=7;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_i!="")
	{
		$j=8;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	if($teacher_j!="")
	{
		$j=9;
			for($i=0;$i<6;$i++)
			{
				$x=$i+1;
				$y=$j+1;
				
				$b[$i][$j]=$_POST["b"."$x"."$y"];					
			}
			
			for($i=0;$i<6;$i++)
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
	
	$terr=array("1","","","","","","","","","");
	$r=array("","","","","","","","","","");
	
	if($teacher_a!="")
	{	
		$i=0;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);	
	}
	if($teacher_b!="")
	{	
		$i=1;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_c!="")
	{	
		$i=2;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_d!="")
	{	
		$i=3;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_e!="")
	{	
		$i=4;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_f!="")
	{	
		$i=5;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_g!="")
	{	
		$i=6;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_h!="")
	{	
		$i=7;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_i!="")
	{	
		$i=8;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}
	if($teacher_j!="")
	{	
		$i=9;
		$r[$i]=$_POST["r"."$i"];
		$r[$i]=preg_replace("([']+)", "  ", $r[$i]);		
	}

	
	if(!empty($_POST['fav'])){
		
		foreach($_POST['fav'] as $fav){
		if($fav==$teacher_a)
		{$fav_a=1;}elseif($fav==$teacher_b)
			{$fav_b=1;}elseif($fav==$teacher_c)
				{$fav_c=1;}elseif($fav==$teacher_d)
					{$fav_d=1;}elseif($fav==$teacher_e)
						{$fav_e=1;}elseif($fav==$teacher_f)
							{$fav_f=1;}elseif($fav==$teacher_g)
								{$fav_g=1;}elseif($fav==$teacher_h)
									{$fav_h=1;}elseif($fav==$teacher_i)
										{$fav_i=1;}elseif($fav==$teacher_j)
											{$fav_j=1;}
										
		}
	}

	
if($flag==1 and $sqlflag==1 and $remarkflag==1)
{
	$q1="INSERT INTO ".$teacher_a." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][0].",".$b[1][0].",".$b[2][0].",".$b[3][0].",".$b[4][0].",".$b[5][0].",'".$r[0]."','".$fav_a."');";
	$q2="INSERT INTO ".$teacher_b." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][1].",".$b[1][1].",".$b[2][1].",".$b[3][1].",".$b[4][1].",".$b[5][1].",'".$r[1]."','".$fav_b."');";
	$q3="INSERT INTO ".$teacher_c." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][2].",".$b[1][2].",".$b[2][2].",".$b[3][2].",".$b[4][2].",".$b[5][2].",'".$r[2]."','".$fav_c."');";
	$q4="INSERT INTO ".$teacher_d." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][3].",".$b[1][3].",".$b[2][3].",".$b[3][3].",".$b[4][3].",".$b[5][3].",'".$r[3]."','".$fav_d."');";
	$q5="INSERT INTO ".$teacher_e." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][4].",".$b[1][4].",".$b[2][4].",".$b[3][4].",".$b[4][4].",".$b[5][4].",'".$r[4]."','".$fav_e."');";
	$q6="INSERT INTO ".$teacher_f." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][5].",".$b[1][5].",".$b[2][5].",".$b[3][5].",".$b[4][5].",".$b[5][5].",'".$r[5]."','".$fav_f."');";
	
	$q7="INSERT INTO ".$teacher_g." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][6].",".$b[1][6].",".$b[2][6].",".$b[3][6].",".$b[4][6].",".$b[5][6].",'".$r[6]."','".$fav_g."');";
	$q8="INSERT INTO ".$teacher_h." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][7].",".$b[1][7].",".$b[2][7].",".$b[3][7].",".$b[4][7].",".$b[5][7].",'".$r[7]."','".$fav_h."');";
	$q9="INSERT INTO ".$teacher_i." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][8].",".$b[1][8].",".$b[2][8].",".$b[3][8].",".$b[4][8].",".$b[5][8].",'".$r[8]."','".$fav_i."');";
   $q10="INSERT INTO ".$teacher_j." (rno,subject1,subject2,subject3,subject4,subject5,subject6,text,fav) VALUES(".$rno.",".$b[0][9].",".$b[1][9].",".$b[2][9].",".$b[3][9].",".$b[4][9].",".$b[5][9].",'".$r[9]."','".$fav_j."');";
	
	
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
	
	
	if($tcount==$qcount)
	{
		$_SESSION['formfilled']="formfilled";
		header("location:feedbacksuccess");
	}
	else
	{echo "error".mysqli_error($conn); }
}
	
	
	
	
}

?>
<html>
	<head>
	<title>Feedback Form</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
		<style>
		
			.err{
			color: red;
			font-size: 20px;
			border: 1px solid #5cb85c;
			background-color:white;
			width:50%;
			text-align:center;
			
			
			}
	form{
		text-align: center;
		align:center;
	}
	body{
		background-image:url(pics/heidi.jpg);
		background-attachment: fixed;
background-repeat: no-repeat;
margin:2px;
	}
	th{
		font-size:15px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:5px; 
		
		text-transform:capitalize;
		
	}
	input[type=number],[type=text]{
		font-size: 15px;
    width: 130px;
	height: 50px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    
    text-align:center;
	background-color:white;
    padding: 5px 5px 5px 20px;
    
}


input[type=number]:hover{
	background-color: #f5f5dc;
	border-color:#5cb85c;
}
input[type=text]:hover{
	background-color: #f5f5dc;
	border-color: #5cb85c;
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
	.name{
		
		border:2px solid red;
		
	}

	
	.left{
		margin:2px 0px 2px 0px;
		font-size:20px;
		width:auto;
		padding:5px;
		#border:2px solid #EFF6FC;
		color:red;
		text-align:left;
		
		
		text-transform:capitalize;
	}
	
	
.fav{
	font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:9px;
	
		text-transform:capitalize;
}
		</style>
	</head>
	<body>
						<div class="left"> <?php echo "Hello, ".$sname; ?></div> <div class="left"> <?php if($rno!=00){echo "Roll No.: ".$rno;}?> </div>
	<br>
	
	<center><div class="err">
	<?php
	 if(!empty($valueerr))
		{	
			echo $valueerr;
		}else{echo "<marquee>Value should be 0-4.</marquee>";}
	?>	
		
	</div></center>
		<form method="post" action="">
			<table align="center">
				<tr><th>Subject</th>								<?php if($teacher_a!=""){ echo "<th>".$teacher_a."</th>";} if($teacher_b!=""){ echo "<th>".$teacher_b."</th>";} if($teacher_c!=""){ echo "<th>".$teacher_c."</th>";} if($teacher_d!=""){ echo "<th>".$teacher_d."</th>";} if($teacher_e!=""){ echo "<th>".$teacher_e."</th>";} if($teacher_f!=""){ echo "<th>".$teacher_f."</th>";} if($teacher_g!=""){ echo "<th>".$teacher_g."</th>";} if($teacher_h!=""){ echo "<th>".$teacher_h."</th>";} if($teacher_i!=""){ echo "<th>".$teacher_i."</th>";} if($teacher_j!=""){ echo "<th>".$teacher_j."</th>";}?> </tr>
				<tr><th>Punctuality in the Class</th>	 			<?php if($teacher_a!=""){if(isset($_POST['submit']) and $e[0][0]==11){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b11' value='";if(isset($_POST['submit'])){echo $b[0][0];}echo "'></td>";}?> <?php if($teacher_b!=""){if(isset($_POST['submit']) and $e[0][1]==12){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b12' value='";if(isset($_POST['submit'])){echo $b[0][1];}echo "'></td>";}?> <?php if($teacher_c!=""){if(isset($_POST['submit']) and $e[0][2]==13){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b13' value='";if(isset($_POST['submit'])){echo $b[0][2];}echo "'></td>";}?> <?php if($teacher_d!=""){if(isset($_POST['submit']) and $e[0][3]==14){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b14' value='";if(isset($_POST['submit'])){echo $b[0][3];}echo "'></td>";}?> <?php if($teacher_e!=""){if(isset($_POST['submit']) and $e[0][4]==15){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b15' value='";if(isset($_POST['submit'])){echo $b[0][4];}echo "'></td>";}?> <?php if($teacher_f!=""){if(isset($_POST['submit']) and $e[0][5]==16){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b16' value='";if(isset($_POST['submit'])){echo $b[0][5];}echo "'></td>";}?> <?php if($teacher_g!=""){if(isset($_POST['submit']) and $e[0][6]==17){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b17' value='";if(isset($_POST['submit'])){echo $b[0][6];}echo "'></td>";}?> <?php if($teacher_h!=""){if(isset($_POST['submit']) and $e[0][7]==18){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b18' value='";if(isset($_POST['submit'])){echo $b[0][7];}echo "'></td>";}?> <?php if($teacher_i!=""){if(isset($_POST['submit']) and $e[0][8]==19){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b19' value='";if(isset($_POST['submit'])){echo $b[0][8];}echo "'></td>";}?> <?php if($teacher_j!=""){if(isset($_POST['submit']) and $e[0][9]==110){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b110' value='";if(isset($_POST['submit'])){echo $b[0][9];}echo "'></td>";}?> </tr>  
				<tr><th>Regularity in taking Classes</th>			<?php if($teacher_a!=""){if(isset($_POST['submit']) and $e[1][0]==21){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b21' value='";if(isset($_POST['submit'])){echo $b[1][0];}echo "'></td>";}?> <?php if($teacher_b!=""){if(isset($_POST['submit']) and $e[1][1]==22){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b22' value='";if(isset($_POST['submit'])){echo $b[1][1];}echo "'></td>";}?> <?php if($teacher_c!=""){if(isset($_POST['submit']) and $e[1][2]==23){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b23' value='";if(isset($_POST['submit'])){echo $b[1][2];}echo "'></td>";}?> <?php if($teacher_d!=""){if(isset($_POST['submit']) and $e[1][3]==24){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b24' value='";if(isset($_POST['submit'])){echo $b[1][3];}echo "'></td>";}?> <?php if($teacher_e!=""){if(isset($_POST['submit']) and $e[1][4]==25){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b25' value='";if(isset($_POST['submit'])){echo $b[1][4];}echo "'></td>";}?> <?php if($teacher_f!=""){if(isset($_POST['submit']) and $e[1][5]==26){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b26' value='";if(isset($_POST['submit'])){echo $b[1][5];}echo "'></td>";}?> <?php if($teacher_g!=""){if(isset($_POST['submit']) and $e[1][6]==27){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b27' value='";if(isset($_POST['submit'])){echo $b[1][6];}echo "'></td>";}?> <?php if($teacher_h!=""){if(isset($_POST['submit']) and $e[1][7]==28){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b28' value='";if(isset($_POST['submit'])){echo $b[1][7];}echo "'></td>";}?> <?php if($teacher_i!=""){if(isset($_POST['submit']) and $e[1][8]==29){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b29' value='";if(isset($_POST['submit'])){echo $b[1][8];}echo "'></td>";}?> <?php if($teacher_j!=""){if(isset($_POST['submit']) and $e[1][9]==210){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b210' value='";if(isset($_POST['submit'])){echo $b[1][9];}echo "'></td>";}?> </tr>
				<tr><th>Completes syllabus in time</th>				<?php if($teacher_a!=""){if(isset($_POST['submit']) and $e[2][0]==31){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b31' value='";if(isset($_POST['submit'])){echo $b[2][0];}echo "'></td>";}?> <?php if($teacher_b!=""){if(isset($_POST['submit']) and $e[2][1]==32){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b32' value='";if(isset($_POST['submit'])){echo $b[2][1];}echo "'></td>";}?> <?php if($teacher_c!=""){if(isset($_POST['submit']) and $e[2][2]==33){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b33' value='";if(isset($_POST['submit'])){echo $b[2][2];}echo "'></td>";}?> <?php if($teacher_d!=""){if(isset($_POST['submit']) and $e[2][3]==34){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b34' value='";if(isset($_POST['submit'])){echo $b[2][3];}echo "'></td>";}?> <?php if($teacher_e!=""){if(isset($_POST['submit']) and $e[2][4]==35){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b35' value='";if(isset($_POST['submit'])){echo $b[2][4];}echo "'></td>";}?> <?php if($teacher_f!=""){if(isset($_POST['submit']) and $e[2][5]==36){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b36' value='";if(isset($_POST['submit'])){echo $b[2][5];}echo "'></td>";}?> <?php if($teacher_g!=""){if(isset($_POST['submit']) and $e[2][6]==37){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b37' value='";if(isset($_POST['submit'])){echo $b[2][6];}echo "'></td>";}?> <?php if($teacher_h!=""){if(isset($_POST['submit']) and $e[2][7]==38){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b38' value='";if(isset($_POST['submit'])){echo $b[2][7];}echo "'></td>";}?> <?php if($teacher_i!=""){if(isset($_POST['submit']) and $e[2][8]==39){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b39' value='";if(isset($_POST['submit'])){echo $b[2][8];}echo "'></td>";}?> <?php if($teacher_j!=""){if(isset($_POST['submit']) and $e[2][9]==310){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b310' value='";if(isset($_POST['submit'])){echo $b[2][9];}echo "'></td>";}?> </tr>
				<tr><th>Conducting the classroom discussions</th>	<?php if($teacher_a!=""){if(isset($_POST['submit']) and $e[3][0]==41){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b41' value='";if(isset($_POST['submit'])){echo $b[3][0];}echo "'></td>";}?> <?php if($teacher_b!=""){if(isset($_POST['submit']) and $e[3][1]==42){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b42' value='";if(isset($_POST['submit'])){echo $b[3][1];}echo "'></td>";}?> <?php if($teacher_c!=""){if(isset($_POST['submit']) and $e[3][2]==43){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b43' value='";if(isset($_POST['submit'])){echo $b[3][2];}echo "'></td>";}?> <?php if($teacher_d!=""){if(isset($_POST['submit']) and $e[3][3]==44){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b44' value='";if(isset($_POST['submit'])){echo $b[3][3];}echo "'></td>";}?> <?php if($teacher_e!=""){if(isset($_POST['submit']) and $e[3][4]==45){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b45' value='";if(isset($_POST['submit'])){echo $b[3][4];}echo "'></td>";}?> <?php if($teacher_f!=""){if(isset($_POST['submit']) and $e[3][5]==46){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b46' value='";if(isset($_POST['submit'])){echo $b[3][5];}echo "'></td>";}?> <?php if($teacher_g!=""){if(isset($_POST['submit']) and $e[3][6]==47){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b47' value='";if(isset($_POST['submit'])){echo $b[3][6];}echo "'></td>";}?> <?php if($teacher_h!=""){if(isset($_POST['submit']) and $e[3][7]==48){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b48' value='";if(isset($_POST['submit'])){echo $b[3][7];}echo "'></td>";}?> <?php if($teacher_i!=""){if(isset($_POST['submit']) and $e[3][8]==49){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b49' value='";if(isset($_POST['submit'])){echo $b[3][8];}echo "'></td>";}?> <?php if($teacher_j!=""){if(isset($_POST['submit']) and $e[3][9]==410){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b410' value='";if(isset($_POST['submit'])){echo $b[3][9];}echo "'></td>";}?> </tr>
				<tr><th>Teaching the subject matter</th>			<?php if($teacher_a!=""){if(isset($_POST['submit']) and $e[4][0]==51){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b51' value='";if(isset($_POST['submit'])){echo $b[4][0];}echo "'></td>";}?> <?php if($teacher_b!=""){if(isset($_POST['submit']) and $e[4][1]==52){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b52' value='";if(isset($_POST['submit'])){echo $b[4][1];}echo "'></td>";}?> <?php if($teacher_c!=""){if(isset($_POST['submit']) and $e[4][2]==53){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b53' value='";if(isset($_POST['submit'])){echo $b[4][2];}echo "'></td>";}?> <?php if($teacher_d!=""){if(isset($_POST['submit']) and $e[4][3]==54){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b54' value='";if(isset($_POST['submit'])){echo $b[4][3];}echo "'></td>";}?> <?php if($teacher_e!=""){if(isset($_POST['submit']) and $e[4][4]==55){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b55' value='";if(isset($_POST['submit'])){echo $b[4][4];}echo "'></td>";}?> <?php if($teacher_f!=""){if(isset($_POST['submit']) and $e[4][5]==56){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b56' value='";if(isset($_POST['submit'])){echo $b[4][5];}echo "'></td>";}?> <?php if($teacher_g!=""){if(isset($_POST['submit']) and $e[4][6]==57){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b57' value='";if(isset($_POST['submit'])){echo $b[4][6];}echo "'></td>";}?> <?php if($teacher_h!=""){if(isset($_POST['submit']) and $e[4][7]==58){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b58' value='";if(isset($_POST['submit'])){echo $b[4][7];}echo "'></td>";}?> <?php if($teacher_i!=""){if(isset($_POST['submit']) and $e[4][8]==59){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b59' value='";if(isset($_POST['submit'])){echo $b[4][8];}echo "'></td>";}?> <?php if($teacher_j!=""){if(isset($_POST['submit']) and $e[4][9]==510){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b510' value='";if(isset($_POST['submit'])){echo $b[4][9];}echo "'></td>";}?> </tr>
				<tr><th>Student's participation in the class</th>	<?php if($teacher_a!=""){if(isset($_POST['submit']) and $e[5][0]==61){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b61' value='";if(isset($_POST['submit'])){echo $b[5][0];}echo "'></td>";}?> <?php if($teacher_b!=""){if(isset($_POST['submit']) and $e[5][1]==62){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b62' value='";if(isset($_POST['submit'])){echo $b[5][1];}echo "'></td>";}?> <?php if($teacher_c!=""){if(isset($_POST['submit']) and $e[5][2]==63){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b63' value='";if(isset($_POST['submit'])){echo $b[5][2];}echo "'></td>";}?> <?php if($teacher_d!=""){if(isset($_POST['submit']) and $e[5][3]==64){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b64' value='";if(isset($_POST['submit'])){echo $b[5][3];}echo "'></td>";}?> <?php if($teacher_e!=""){if(isset($_POST['submit']) and $e[5][4]==65){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b65' value='";if(isset($_POST['submit'])){echo $b[5][4];}echo "'></td>";}?> <?php if($teacher_f!=""){if(isset($_POST['submit']) and $e[5][5]==66){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b66' value='";if(isset($_POST['submit'])){echo $b[5][5];}echo "'></td>";}?> <?php if($teacher_g!=""){if(isset($_POST['submit']) and $e[5][6]==67){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b67' value='";if(isset($_POST['submit'])){echo $b[5][6];}echo "'></td>";}?> <?php if($teacher_h!=""){if(isset($_POST['submit']) and $e[5][7]==68){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b68' value='";if(isset($_POST['submit'])){echo $b[5][7];}echo "'></td>";}?> <?php if($teacher_i!=""){if(isset($_POST['submit']) and $e[5][8]==69){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b69' value='";if(isset($_POST['submit'])){echo $b[5][8];}echo "'></td>";}?> <?php if($teacher_j!=""){if(isset($_POST['submit']) and $e[5][9]==610){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='number' name='b610' value='";if(isset($_POST['submit'])){echo $b[5][9];}echo "'></td>";}?> </tr>
				<tr><th colspan="11" align="center">Enter feedback in text(Optional). <font color="red"> <?php echo $texterr;?></font> </th></tr>
				<tr><th>Remark</th>   
				<?php 
				if($teacher_a!=""){if(isset($_POST['submit']) and $terr[0]==0){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r0' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[0];}echo "'></td>";}
				if($teacher_b!=""){if(isset($_POST['submit']) and $terr[1]==1){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r1' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[1];}echo "'></td>";}
				if($teacher_c!=""){if(isset($_POST['submit']) and $terr[2]==2){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r2' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[2];}echo "'></td>";}
				if($teacher_d!=""){if(isset($_POST['submit']) and $terr[3]==3){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r3' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[3];}echo "'></td>";}
				if($teacher_e!=""){if(isset($_POST['submit']) and $terr[4]==4){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r4' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[4];}echo "'></td>";}
				if($teacher_f!=""){if(isset($_POST['submit']) and $terr[5]==5){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r5' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[5];}echo "'></td>";}
				if($teacher_g!=""){if(isset($_POST['submit']) and $terr[6]==6){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r6' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[6];}echo "'></td>";}
				if($teacher_h!=""){if(isset($_POST['submit']) and $terr[7]==7){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r7' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[7];}echo "'></td>";}
				if($teacher_i!=""){if(isset($_POST['submit']) and $terr[8]==8){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r8' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[8];}echo "'></td>";}
				if($teacher_j!=""){if(isset($_POST['submit']) and $terr[9]==9){echo "<td class='name'>";}else{echo "<td>";}echo "<input type='text' name='r9' maxlength='1000' value='";if(isset($_POST['submit'])){ echo $r[9];}echo "'></td>";}
				?></tr>
				
				<tr><th>Favorite teacher:</th>
				<?php
				if($teacher_a!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_a' ";if(!empty($fav_a)){echo "checked";} echo ">Yes</td>";}
				if($teacher_b!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_b' ";if(!empty($fav_b)){echo "checked";} echo ">Yes</td>";}
				if($teacher_c!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_c' ";if(!empty($fav_c)){echo "checked";} echo ">Yes</td>";}
				if($teacher_d!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_d' ";if(!empty($fav_d)){echo "checked";} echo ">Yes</td>";}
				if($teacher_e!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_e' ";if(!empty($fav_e)){echo "checked";} echo ">Yes</td>";}
				if($teacher_f!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_f' ";if(!empty($fav_f)){echo "checked";} echo ">Yes</td>";}
				if($teacher_g!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_g' ";if(!empty($fav_g)){echo "checked";} echo ">Yes</td>";}
				if($teacher_h!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_h' ";if(!empty($fav_h)){echo "checked";} echo ">Yes</td>";}
				if($teacher_i!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_i' ";if(!empty($fav_i)){echo "checked";} echo ">Yes</td>";}
				if($teacher_j!=""){echo "<td class='fav' align='center'><input type='checkbox' name='fav[]' value='$teacher_j' ";if(!empty($fav_j)){echo "checked";} echo ">Yes</td>";}
				
				?></tr>
				<tr><td colspan="11" align="center"><input type="submit" name="submit" value="Submit"></td></tr>		
				
				
			</table>
		</form>
	</body>
</html>