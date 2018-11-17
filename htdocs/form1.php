<?php
session_start();
$sname=$fname=$rno=$email=$branch=$class=$section=$gender=$password=$passworda=$flag=$snameflag=$emailflag=$genderflag=$fnameflag=$classflag="";
$passwordflag=$passwordaflag=$rnoflag=$sqlflag=$branchflag=$semesterflag="";
$snameerr=$fnameerr=$emerr=$gendererr=$rnoerr=$brancherr=$classerr=$semestererr=$passworderr=$sqlerr=$q="";

include 'connect.php';
//echo $sqlflag;
if(isset($_POST['submit'])){
	
/*mysql connection=>*/	/*<=mysql connection*/
	
	
	$sname = input($_POST["sname"]);
	if(empty($_POST["sname"]))
	{
		$snameerr="Student's name is required.";
	}
	else
	if (!preg_match("/^[a-zA-Z ]*$/",$sname))
{
	$snameerr="Invalid name";
}
else{
	$snameflag=1;
}
$fname = input($_POST["fname"]);
if(empty($_POST["fname"]))
	{
		$fnameerr="Father's name is required.";
	}
	else
	if (!preg_match("/^[a-zA-Z ]*$/",$fname))
{
	$fnameerr="Invalid name";
}
else{
	$fnameflag=1;
}
$email = input($_POST["email"]);
if(empty($email))
{
	$email="";//$emerr="Email is Required";
	$emailflag=1;
	}


else
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$emerr="Invalid email";
}
else{
	$emailflag=1;
}


  
  $gender=$_POST["gender"];
  if(empty($gender))
  {
	  $gendererr="Gender is required.";
}
else 
{
$genderflag=1;
}
$branch=$_POST['branch'];
if(empty($branch))
{
	$brancherr="Branch is required";
}else{$branchflag=1;}

$semester=$_POST['semester'];
if(empty($semester))
{
	$semestererr="Semester is required";
}else{$semesterflag=1;}


	$rno=$_POST['rno'];
	$q1="SELECT * FROM student WHERE rno='".$rno."';";
	
	if(empty($rno))
	{
		$rnoerr="Registration no is required";
	}else
		if(!is_numeric($rno))//!filter_var($rno,FILTER_VALIDATE_INT)
		{
			$rnoerr="Invalid No.";
		}else
			if(strlen($rno)>10 or strlen($rno)<6)
			{
				$rnoerr="Enter 6-10 digit Registration No.";
			}else
				{
					
					$rnoresult=mysqli_query($conn,$q1);
					$rnorow=mysqli_num_rows($rnoresult);
					if($rnorow>0)
					{
						$rnoerr="Already registered,contact admin.";
					}else{
							$rnoflag="1";
						}
	
				}		
	
	$class=$_POST['class'];
	if(empty($class))
	{
		$classerr="Class is required";
	}elseif(($semester=="3rd" or $semester=="7th") and $class=="CSE-B")
	{
		$classerr="You can't select 'CSE-B' Class";
	}
	else
	{ $classflag=1;}
	
	$password=$_POST['password'];
	$passworda=$_POST['passworda'];
	if(empty($password) or empty($passworda))
	{
		$passworderr="Password is required";
	}else
	if($password!=$passworda)
	{
		$passworderr="Password should be same";
	}
	else{$passwordflag=1;}

	

	
	
	
	//echo $sqlflag,$snameflag,$fnameflag,$rnoflag,$classflag,$passwordflag,$emailflag,$genderflag;
	
	
if($sqlflag==1 and $snameflag==1 and $fnameflag==1 and $rnoflag==1 and $branchflag==1 and  $classflag==1 and $semesterflag==1 and $passwordflag==1 and $emailflag==1 and $genderflag==1)
{
	
	$status="nf";
	$q="INSERT INTO student (sname,fname,rno,email,branch,class,sem,gender,password,status) VALUES('$sname','$fname','$rno','$email','$branch','$class','$semester','$gender','$password','$status')";
	if(mysqli_query($conn,"$q"))
	
		mysqli_close($conn);
		$_SESSION['sname']="$sname";
		$_SESSION['rno']="$rno";
		header("location:registered?success='success'");
	}
	/*else
	{
		//commented due to an error
		$sqlerr="Error in Database(values not accepted)::".mysqli_error($conn);
		
	}*/
	
	
}
else
{
	//debugging
  /*echo "s ".$snameflag."f ".$fnameflag."r ".$rnoflag."c ".$classflag."p ".$passwordflag."g ".$genderflag."e ".$emailflag;*/
  //echo $sqlflag;
  $flag="false";
  
  //echo "All field is required";
}
//}

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




?>

<html>
<head>
<link rel="icon" type="image/gif/png" href="pics/logo.png">
<title>Registeration</title>
	<head>
	
	
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
							document.getElementById("list").innerHTML=req.responseText;
						}
					};
					req.open("GET","class.php?branch="+val,true);
					req.send();
					
			}
	</script>
	<style>
	
	
	.err{color: red;
		font-size: 15px;
		
		/*background-color: white;
		text-align:center;
		align:center;
		*/
		
	}
	body{
		background-image:url(pics/heidi.jpg);
	background-attachment: fixed;
background-repeat: no-repeat;
	}
	.name{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:5px;
		
		
	}
	input[type=text],[type=password],select {
    width: 350px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
   
    font-size: 15px;
	text-transform: capitalize;
    background-color: white;
    padding: 5px 5px 5px 20px;
    
}

[type=password]:hover{
	background-color: #f5f5dc;
	border-color: #4CAF50;
}
input[type=text]:hover{
	background-color: #f5f5dc;
	border-color: #4CAF50;
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

.select:hover{
	background-color: #f5f5dc;
	border-color: #4CAF50;
	
}
.marg{
	
	background-color:#FBFCFE;
			padding:10px;
			opacity: 0.9;
			width:750px;
			align:center;
			margin:2% 24% 5% 24%;
}

	.button{
		width: 280px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    
    font-size: 15px;
	text-align:center;
    background-color: white;
    
    padding: 5px 5px 5px 20px;
 
	}
	.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
	.button:hover{
	
		background-color:green;
	}
		
	
	.adminbutton{
		text-decoration:none;
		margin:5px;
		height:7px;
		font-size:18px;
		
    font-size: 20px;
	text-align:center;
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 14px 50px;
	}.adminbutton:hover{background-color:green;}
	</style>
	</head><br>
	
	<body>
	<p align="right"><a href="student-login" class="adminbutton">Login</a><a href="home" class="adminbutton">Home</a></p>
		<br><center>
		<div class="marg" align="center">
		
		<form method="post" action="" name="form1">
		
			<table  align="center">
				<tr>
					
					<td><input type="text" name="sname" value="<?php echo $sname;?>" placeholder="Student's Name" <?php if($snameerr!=""){echo "style='border-color:red;'";}?>></td><td><input type="text" name="fname" value="<?php echo $fname;?>" placeholder="Father's Name" <?php if($fnameerr!=""){echo "style='border-color:red;'";}?>></td>
					
				</tr>
				<tr><td><div class="err"><?php echo $snameerr; ?></div></td><td><div class="err"><?php echo $fnameerr; ?></div></td></tr>
				
				<tr>
				
					<td><input type="text" name="rno" value="<?php echo $rno;?>" placeholder="Class Roll No." <?php if($rnoerr!=""){echo "style='border-color:red;'";}?>></td><td><input type="text" name="email" value="<?php echo $email;?>" placeholder="Email (Optional)" <?php if($emerr!=""){echo "style='border-color:red;'";}?>></td>

					
				</tr>
				<tr><td><div class="err"><?php echo $rnoerr; ?></div></td><td><div class="err"><?php echo $emerr; ?></div></td></tr>
				
				<tr>
					
					<td>
						<select name="branch" onchange="list(this.value)" class="select" <?php if($brancherr!=""){echo "style='border-color:red;'";}?>>
						<option value="">Branch</option>
						<option value="civil">Civil</option>
						<option value="mechanical">Mechanical</option>
						<option value="computer_science">Computer Science</option>
						<option value="electrical_and_electronics">Electrical and Electronics</option>
						<option value="electronics_and_communication">Electronics and Communication</option>
						</select>
					</td>
					<td><select name="gender" class="select" <?php if($gendererr!=""){echo "style='border-color:red;'";}?>>
							<option value="">Gender</option>
							<option value="male" <?php if($gender=="male"){ echo "selected";}?>>Male</option>
							<option value="female" <?php if($gender=="female"){ echo "selected";}?>>Female</option>
						</select>
					</td>
					
					
				</tr>
				<tr><td><div id="err" class="err"><?php echo $brancherr; ?></div></td><td><div class="err"><?php echo $gendererr; ?></div></td></tr>
				<tr>
					
					<td><select  name="semester"  class="select" <?php if($semestererr!=""){echo "style='border-color:red;'";}?>>
							<option value="">Semester</option>
							<option value="1st" >First</option>
							<option value="3rd" >Third</option>
							<option value="5th" >Fifth</option>
							<option value="7th" >Seventh</option>
						</select>
					</td>
					<td><input type="password" name="password" placeholder="Password" <?php if($passworderr!=""){echo "style='border-color:red;'";}?>></td>
					
					
				</tr>
				<tr><td><div class="err"><?php echo $semestererr; ?></div></td></tr>
				<tr>
					<td id="list">
						<select name="class" class="select" <?php if($classerr!=""){echo "style='border-color:red;'";}?>>
						<option value="">Class(select branch first)</option>
						
						</select>
					</td>
					<td><input type="password" name="passworda" placeholder="Password Again" <?php if($passworderr!=""){echo "style='border-color:red;'";}?>></td>
			
				</tr>
				<tr><td><div class="err"><?php echo $classerr; ?></div></td><td><div class="err"><?php echo $passworderr; ?></div></td></tr>
				
					
					
					
					
				
				
				<tr align="center" >
					<td colspan="2"><input type="submit" name="submit" value="Register"</td>
				</tr>
				
			</table>
		
		
		</form>
		
</div>	</center></body>
	
	
</head>
</html>