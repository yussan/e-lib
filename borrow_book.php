<?php
	include "function.php";
	connection();

	$book_id = $_GET['book'];
	$date_now =date('y-m-d');
	//$date_end = CURDATE();
	$sql = "INSERT INTO user_self VALUES(1,1,1,CURDATE(),CURDATE()+30)";
	mysql_query("$sql");

	
	//header("location:index.php");

?>

