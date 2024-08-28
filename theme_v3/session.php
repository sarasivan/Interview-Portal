<?php
session_start();


if($_SESSION['login'] == 1) 
{
	// Nothing ...!!
}
else
{
	 header("Location:login.php");
}

?>