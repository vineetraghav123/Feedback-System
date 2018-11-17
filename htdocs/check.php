<?php
//$x="";
session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:adminlogin");
	}
$branch=$_GET['branch'];
if($branch=="CSE")
{
	echo "<select name='section'>";
	echo "<option value='CSE-A'>CSE-A</option>";
	echo "<option value='CSE-B'>CSE-B</option>";
	echo "</select>";
	
}else
if($branch=="MECH")
{
		echo "<select name='section'>";
	echo "<option value='MECH-A'>MECH-A</option>";
	echo "<option value='MECH-B'>MECH-B</option>";
	echo "</select>";
}else
	if($branch=="")
	{
		echo "<select>";
		echo "<option>select branch first</option>";
		echo "</select>";
	}

?>