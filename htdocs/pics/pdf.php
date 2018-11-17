
<?php
session_start();
	if(!isset($_SESSION['facultyname']))
	{
		header("location:faculty-login");
	}
	$teacher=$_SESSION['facultyname'];
	$facultyname=$_SESSION['facultyname'];
require("fpdf/fpdf.php");
include 'connect.php';
$first=$third=$fifth=$seventh=0;
$sum1=$sum3=$sum5=$sum7=0;

if(isset($_GET['r'])){
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);	
$count=0;

//$pdf->Cell(0,10,"name",1,1,"C");

$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,139,202);
$q="SELECT * from $teacher;";

$pdf->Cell(0,10,"$teacher",1,1,"C",1);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(255,0,0);
$pdf->Cell(0,5,"REMARKS",1,1,"C",1);
$pdf->Ln(5);
$result=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($result)){
	$q1="SELECT class,sem from student WHERE rno='".$row['rno']."';";
	$result1=mysqli_query($conn,$q1);
	$row1=mysqli_fetch_assoc($result1);
	$sem=$row1['sem'];
	
	$str=$row['text'];
	$len=strlen($str);
	$pdf->SetTextColor(250,0,0);
	$pdf->Write(0,"($count) ");
	$count++;
	$pdf->SetTextColor(66,139,202);
	$pdf->Write(0,"($sem) : ");
	$pdf->SetTextColor(0,0,0);
	if($len>120){
		$m=$len/120;
		$m=$m+1;
		//$w=10*$m;
		
		for($i=0;$i<$m;$i++){
			$x=$i*120;
		$tmp=substr($str,$x,120);
		
		$pdf->Write(0,$tmp);
		$pdf->Ln(4);
		}
		
		
	}else{
		$pdf->Write(0,$str);
		$pdf->Ln(5);
	}
	$pdf->Cell(0,0,"",1,0,"C");
	$pdf->Ln(5);
	
}
$name=$teacher."_remarks.pdf";
$pdf->Output("D","$name");
}

if(isset($_GET['n'])){
	$count=0;
	$pdf1=new FPDF();
$pdf1->AddPage();
$pdf1->SetFont('Arial','B',8);	
$pdf1->SetTextColor(255,255,255);
$pdf1->SetFillColor(66,139,202);

$pdf1->Cell(0,10,"$teacher",1,1,"C",1);
$pdf1->SetTextColor(255,255,255);
$pdf1->SetFillColor(255,0,0);
$pdf1->Cell(18,10,"Punctuality",1,0,"C",1);
$pdf1->Cell(17,10,"Regularity",1,0,"C",1);
$pdf1->Cell(28,10,"Completes syllabus",1,0,"C",1);
$pdf1->Cell(49,10,"Conducting classroom discussions",1,0,"C",1);
$pdf1->Cell(34,10,"Teaching subject matter",1,0,"C",1);
$pdf1->Cell(44,10,"Student's participation in class",1,1,"C",1);

$q="SELECT * from $teacher;";
$result=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($result)){
	$q1="SELECT class,sem from student WHERE rno='".$row['rno']."';";
	$result1=mysqli_query($conn,$q1);
	$row1=mysqli_fetch_assoc($result1);
	$sem=$row1['sem'];
	
	$pdf1->SetTextColor(250,0,0);
	$pdf1->Cell(2,5,"$count",0,0,"C");
	$count++;
	$pdf1->SetTextColor(66,139,202);
	//$pdf1->Write(0,"($sem) :");
	$pdf1->Cell(5,5,$sem,1,0,"C");
	$pdf1->SetTextColor(0,0,0);
	$pdf1->Cell(11,5,$row['subject1'],1,0,"C");
	$pdf1->Cell(17,5,$row['subject2'],1,0,"C");
	$pdf1->Cell(28,5,$row['subject3'],1,0,"C");
	$pdf1->Cell(49,5,$row['subject4'],1,0,"C");
	$pdf1->Cell(34,5,$row['subject5'],1,0,"C");
	$pdf1->Cell(44,5,$row['subject6'],1,1,"C");
}

$name=$teacher."_marks.pdf";

$pdf1->Output("D","$name");
	
	
}
if(isset($_GET['a'])){
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
						$m1=$row1['sum(subject1)'];
						$m2=$row2['sum(subject2)'];
						$m3=$row3['sum(subject3)'];
						$m4=$row4['sum(subject4)'];
						$m5=$row5['sum(subject5)'];
						$m6=$row6['sum(subject6)'];
						$fav=$row7['sum(fav)'];
$obtained=$m1+$m2+$m3+$m4+$m5+$m6;
		$pdf1=new FPDF();
$pdf1->AddPage();
$pdf1->SetFont('Arial','B',8);	
$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(66,139,202);
$pdf1->Cell(0,10,"$teacher",1,1,"C",1);
$pdf1->Ln(5);
$t=$row['count(rno)'];
$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(255,0,0);
$pdf1->Cell(0,5,"Total Feedback Given: $t",1,1,"C",1);

$pdf1->Cell(0,5,"Feedback Marks From: $fp [Total feedback given * max per Subject(like Punctuality)][Max=4,Min=0]",1,1,"C",1);

$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(66,139,202);

$pdf1->Cell(18,10,"Punctuality",1,0,"C",1);
$pdf1->Cell(17,10,"Regularity",1,0,"C",1);
$pdf1->Cell(28,10,"Completes syllabus",1,0,"C",1);
$pdf1->Cell(49,10,"Conducting classroom discussions",1,0,"C",1);
$pdf1->Cell(34,10,"Teaching subject matter",1,0,"C",1);
$pdf1->Cell(44,10,"Student's participation in class",1,1,"C",1);



$pdf1->SetTextColor(0,0,0);
$pdf1->Cell(18,5,"$m1",1,0,"C");
$pdf1->Cell(17,5,"$m2",1,0,"C");
$pdf1->Cell(28,5,"$m3",1,0,"C");
$pdf1->Cell(49,5,"$m4",1,0,"C");
$pdf1->Cell(34,5,"$m5",1,0,"C");
$pdf1->Cell(44,5,"$m6",1,1,"C");
$pdf1->Ln(5);


$q="SELECT * FROM $teacher;";
$res=mysqli_query($conn,$q);
function sum($a,$b,$c,$d,$e,$f){
		return($a+$b+$c+$d+$e+$f);
	}
while($t1=mysqli_fetch_assoc($res)){
	$rno=$t1['rno'];
	$sub1=$t1['subject1'];
	$sub2=$t1['subject2'];
	$sub3=$t1['subject3'];
	$sub4=$t1['subject4'];
	$sub5=$t1['subject5'];
	$sub6=$t1['subject6'];
	$sum=sum($sub1,$sub2,$sub3,$sub4,$sub5,$sub6);
	
	$q1="SELECT sem FROM student WHERE rno='$rno';";
	$res1=mysqli_query($conn,$q1);
	$t2=mysqli_fetch_assoc($res1);
	$sem=$t2['sem'];
	if($sem=="1st"){
		$first++;
		$sum1+=$sum;
	}elseif($sem=="3rd"){
		$third++;
		$sum3+=$sum;
	}elseif($sem=="5th"){
		$fifth++;
		$sum5+=$sum;
	}elseif($sem=="7th"){
		$seventh++;
		$sum7+=$sum;
	}
}

if($first>0){
	$maxx=$first*24;
	$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(255,0,0);
	$pdf1->Cell(0,5,"1st Semester",1,1,"C",1);
	$pdf1->SetTextColor(0,0,0);
	$pdf1->Cell(0,5,"Max : $maxx",1,1,"C");
	$pdf1->Cell(0,5,"Obtained : $sum1",1,1,"C");
	$pdf1->Ln(5);
}
if($third>0){
	$maxx=$third*24;
	$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(255,0,0);
	$pdf1->Cell(0,5,"3rd Semester",1,1,"C",1);
	$pdf1->SetTextColor(0,0,0);
	$pdf1->Cell(0,5,"Max : $maxx",1,1,"C");
	$pdf1->Cell(0,5,"Obtained : $sum3",1,1,"C");
	$pdf1->Ln(5);
}
if($fifth>0){
	$maxx=$fifth*24;
	$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(255,0,0);
	$pdf1->Cell(0,5,"5th Semester",1,1,"C",1);
	$pdf1->SetTextColor(0,0,0);
	$pdf1->Cell(0,5,"Max : $maxx",1,1,"C");
	
	$pdf1->Cell(0,5,"Obtained : $sum5",1,1,"C");
	$pdf1->Ln(5);
}
if($seventh>0){
	$maxx=$seventh*24;
	$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(255,0,0);
	$pdf1->Cell(0,5,"7th Semester",1,1,"C",1);
	$pdf1->SetTextColor(0,0,0);
	$pdf1->Cell(0,5,"Max : $maxx",1,1,"C");
	$pdf1->Cell(0,5,"Obtained : $sum7",1,1,"C");
	$pdf1->Ln(5);
}






$pdf1->Ln(5);
$fp*=6;
$pdf1->SetTextColor(255,255,255);
	$pdf1->SetFillColor(255,0,0);
$pdf1->Cell(0,5,"Total",1,1,"C",1);
$pdf1->SetTextColor(255,255,255);
$pdf1->SetFillColor(76,175,80);
$pdf1->Cell(0,5,"Max : $fp",1,1,"C",1);
$pdf1->Cell(0,5,"Obtained : $obtained",1,1,"C",1);
$pdf1->SetTextColor(255,255,255);
$pdf1->Cell(0,5,"$fav Student selected you as favorite teacher.",1,1,"C",1);
$name=$teacher."_avg.pdf";
$pdf1->Output("D","$name");
}
?>

<html >
<head>
	
	<title>PDF</title>
	<link rel="icon" type="image/gif/png" href="pics/logo.png">
	<link rel="stylesheet" href="menu.css" />
	<style>
	.btn{
		width: 230px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    background-color: white;
    padding: 5px 5px 5px 20px;
}
	.btn{
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 3%;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.btn:hover{
	background-color:red;
}
	
	</style>
</head>
<body>
<?php include 'facultynavbar.php';?>
<div style="margin-left:16%;">
<center >
	<a href="pdfdownload?r"  class="btn">Remarks PDF</a>
	<a href="pdfdownload?n"  class="btn">Number PDF</a>
	<a href="pdfdownload?a"  class="btn">Average PDF</a>
	
	</center>
	</div>
</body>
</html>
