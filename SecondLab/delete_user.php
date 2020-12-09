<?php
	session_start();

	require_once 'conn.php';
	
	$id = $_GET["user_id"];
	
	echo"$id";
	
	$res = mysqli_query ($conn, "DELETE FROM `users` WHERE `user_id` = '$id'") or die("Ошибка " . mysqli_error($conn));

	header("Location: index.php");
?>