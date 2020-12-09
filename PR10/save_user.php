<?php

include ("test.php");

$servername = "localhost";
$username = "root";
$password = "";
$database = "testdb";

$conn = mysqli_connect($servername, $username, $password, $database);



    $userlogin = $_POST['login'];
    $userpassword = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

 if (empty($userlogin) or empty($userpassword))
    {
      exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }    
    
    $result = mysqli_query($conn, "SELECT `id` FROM `users` WHERE `login`='$userlogin'");

    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
         exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    $sql = "INSERT INTO users (`first_name`, `last_name`, `password`, `login`, `id_role`) VALUES ('$first_name', '$last_name', '$userpassword', '$userlogin', 1)";
	if (!mysqli_query($conn, $sql)) {
		echo "Произошла ошибка! " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
	header('Location: login.php');
?>