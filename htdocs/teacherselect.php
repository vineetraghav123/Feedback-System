<?php
$query="SELECT user FROM class WHERE branch='$branch' and class='$class' and sem='$sem';";
$tresult=mysqli_query($conn,$query);
$i=0;
while($trow=mysqli_fetch_assoc($tresult))
{
	
	if($i==0)
	{
		$teacher_a=$trow['user'];
	}elseif($i==1)
	{
		$teacher_b=$trow['user'];
	}elseif($i==2)
	{
		$teacher_c=$trow['user'];
	}elseif($i==3)
	{
		$teacher_d=$trow['user'];
	}elseif($i==4)
	{
		$teacher_e=$trow['user'];
	}elseif($i==5)
	{
		$teacher_f=$trow['user'];
	}elseif($i==6)
	{
		$teacher_g=$trow['user'];
	}elseif($i==7)
	{
		$teacher_h=$trow['user'];
	}elseif($i==8)
	{
		$teacher_i=$trow['user'];
	}elseif($i==9)
	{
		$teacher_j=$trow['user'];
	}
	$i++;
}
	
	
?>