<?php
ini_set('max_execution_time',300);
$teacher="";
$sqlflag=$class="";
$t=array("teachera_","teacherb_","teacherc_","teacherd_","teachere_","teacherf_");
if(isset($_POST['submit']))//teachera_c1a
{
	include 'connect.php';
	$class=$_POST['class'];
	for($j=0;$j<6;$j++)
	{		
		$teacher=$t[$j].$class;
		//echo $teacher."<br>";
			if($class=="c1a")
			{
				$q="update faculty set sem='1st',class='CSE-A' where user='".$teacher."';";
			}elseif($class=="c1b")
			{
				$q="update faculty set sem='1st',class='CSE-B' where user='".$teacher."';";
			}elseif($class=="c3a")
			{
				$q="update faculty set sem='3rd',class='CSE-A' where user='".$teacher."';";
			}elseif($class=="c3b")
			{
				$q="update faculty set sem='3rd',class='CSE-B' where user='".$teacher."';";
			}elseif($class=="c7a")
			{
				$q="update faculty set sem='7th',class='CSE-A' where user='".$teacher."';";
			}elseif($class=="c7b")
			{
				$q="update faculty set sem='7th',class='CSE-B' where user='".$teacher."';";
			}elseif($class=="m1a")
			{
				$q="update faculty set sem='1st',class='MECH-A' where user='".$teacher."';";
			}elseif($class=="m3a")
			{
				$q="update faculty set sem='3rd',class='MECH-A' where user='".$teacher."';";
			}elseif($class=="m5a")
			{
				$q="update faculty set sem='5th',class='MECH-A' where user='".$teacher."';";
			}elseif($class=="m7a")
			{
				$q="update faculty set sem='7th',class='MECH-A' where user='".$teacher."';";
			}
			
			//$q="ALTER TABLE ".$teacher." ADD  text varchar( 200 );";
			if(mysqli_query($conn,$q))
				{
					echo "$teacher updated"."<br>";
				}else{
					echo mysqli_error($conn)."<br>";
				}
	
	}
}

?>
<html>
	<body>
		<form method="post" action=""> 
			<input type="text" name="class" value="<?php echo $class;?>">
			<input type="submit" name="submit">
		</form>
	</body>
</html>
<?php

?>
