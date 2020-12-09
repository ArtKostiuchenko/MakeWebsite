<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "testdb";

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	if (count($_POST)>0) { 
		$login = $_POST["login"];
		$password = $_POST["password"];
		
		$res = mysqli_query ($conn, "SELECT * FROM `users` WHERE `login` ='$login' AND `password` ='$password'");
		$row = mysqli_fetch_array($res);
		if (is_array($row)) {
			$_POST['id'] = $row['id'];
			$_POST['login'] = $row['login'];
			echo nl2br("Логин: ");
			echo $login;
			echo nl2br(", пароль: ");
			echo $password;
		} else {
			echo 'Неверный пароль';
			session_unset();
		}
	}
?>
