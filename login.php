<?php

	session_start();
	
	if (isset($_SESSION['user'])) {
		header("Location: /admin.php");
	}

	if (isset($_POST['login']) and isset($_POST['pass'])) {


		$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
		
		$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
		$pass = md5($pass);
		
		include "includes/db.php";

		$find = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
		$cat = mysqli_fetch_assoc($find);
		
		if ($cat == false) {
			echo "Неправильный логин или пароль";
			exit();
		} else {
			$_SESSION['user'] = $login;
		}
		header("Location: /admin.php");	
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initital-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

	<title>Авторизация</title>
</head>
<body>
	<div align="center">
		<h1>Форма авторизации</h1>
		<form action="login.php" method="post">
			<input type="text" name="login" placeholder="Введите логин" required><br>
			<input type="password" name="pass" placeholder="Введите пароль" required><br>
			<button type="submit">Войти</button>
		</form>	
	</div>
	
</body>
</html>
