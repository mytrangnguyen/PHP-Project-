<?php
ob_start();
	session_start();
	$SEVER_NAME = "localhost";
	$USER_NAME_MYSQL="root";
	$PASSWORD_MYSQL="";
	$dbName = "sale_management";

	$connect= mysqli_connect($SEVER_NAME,$USER_NAME_MYSQL,$PASSWORD_MYSQL,$dbName);

	mysqli_set_charset($connect,'UTF8');
	mysqli_select_db($connect,"$dbName");
	mysqli_set_charset($connect,'UTF8');
	
// Check connection
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
