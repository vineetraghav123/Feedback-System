
<html>
	<body>
		<form method="post" action=""> 
			
			<input type="submit" name="submit" name="">
		</form>
	</body>
</html>
<?php
ini_set('max_execution_time',1000);
$teacher="";
$sqlflag="";
$c=0;
if(isset($_POST['submit']))
{
	echo "button pressed";
	include 'connect.php';
	$q="SHOW TABLES;";
	$result=mysqli_query($conn,$q);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			 $teacher=$row['Tables_in_rfgd_20524651_raghav'];
			
				
				// $q="ALTER TABLE ".$teacher." ADD fav VARCHAR( 20 ) NOT NULL DEFAULT '0'";
				$q1="DROP TABLE ".$teacher.";";
				 mysqli_query($conn,$q1);
				 $c++;
			
		}echo "$c table droped";
	}else{echo "0 table";}
	
}

?>