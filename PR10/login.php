<?php
  session_unset();
?>
<!DOCTYPE html>
<html>
<head>
<title>Добро пожаловать!</title>

<style type = "text/css">
a:hover {
  border-bottom: 1px solid;     
  background: #CDFEAA;
}

a{
	font: 14pt sans-serif;
	color: black;
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

</style>
</head>
<body>
<form action="auth.php" method="post">
	<input type="text" name="login">
	<input type="password" name="password">
	<input type="submit" name="confirm" value = "Войти">
</form>
<p><a href = "reg.php">Зарегистрироваться!</a></p>
</body>
</html>


