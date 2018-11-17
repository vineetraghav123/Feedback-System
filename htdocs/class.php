<?php
//$x="";

if(isset($_GET['branch']))
{	
		$branch=$_GET['branch'];

		if($branch=="computer_science")
		{
			echo "<select name='class' onchange='sem(this.value)'>";
			echo "<option value=''>Class</option>";
			echo "<option value='CSE-A'>CSE-A</option>";
			echo "<option value='CSE-B'>CSE-B</option>";
			echo "</select>";
			
		}else
		if($branch=="mechanical")
		{
			echo "<select name='class' onchange='sem(this.value)'>";
			echo "<option value=''>Class</option>";
			echo "<option value='MECH-A'>MECH-A</option>";
			
			echo "</select>";
		}elseif($branch=="electrical_and_electronics")
		{
			echo "<select name='class' onchange='sem(this.value)'>";
			echo "<option value=''>Class</option>";
			echo "<option value='EEE-A'>EEE-A</option>";
			echo "</select>";
		}elseif($branch=="electronics_and_communication")
		{
			echo "<select name='class' onchange='sem(this.value)'>";
			echo "<option value=''>Class</option>";
			echo "<option value='ECE-A'>ECE-A</option>";
			echo "</select>";
			
		}elseif($branch=="civil")
		{
			echo "<select name='class' onchange='sem(this.value)'>";
			echo "<option value=''>Class</option>";
			echo "<option value='CIVIL-A'>CIVIL-A</option>";
			echo "</select>";
			
		}elseif($branch=="all")
		{
			echo "<select name='class' onchange='sem(this.value)'>";
			echo "<option value='all'>All</option>";
			echo "</select>";
			
		}elseif($branch=="")
			{
				echo "<select name='class' >";
				echo "<option>select branch first</option>";
				echo "</select>";
			}
}
/*if(isset($_GET['class']))
{		

	$class=$_GET['class'];
	
	if($class=="CSE-A" or $class=="CSE-B")
	{
		echo	"<select  name='semester'>";
		echo	"<option value=''>1</option>";
		echo	"<option value=''>2</option>";
		echo	"</select>";
	}
	if($class=="MECH-A" or $class=="MECH-B")
	{
		echo	"<select  name='semester'>";
		echo	"<option value=''>3</option>";
		echo	"<option value=''>4</option>";
		echo	"</select>";
	}
}*/
?>