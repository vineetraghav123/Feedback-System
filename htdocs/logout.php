<?php
session_start();
session_destroy();
if(isset($_GET['faculty']))
{
	header("location:faculty-login?logout");
}else
header("location:admin-login?logout");


?>