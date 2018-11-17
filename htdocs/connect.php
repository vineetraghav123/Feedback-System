<?php
	//$sqlflag==0;
	$conn = mysqli_connect('host','username','password','DB name');
	if (!$conn)
	{
		mysqli_connect_error($conn);//header("location:serverdown.php");
	}
	else{$sqlflag=1;}
?>
