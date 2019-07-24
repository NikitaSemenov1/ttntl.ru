<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: /");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initital-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Администрирование</title>
</head>
<body>
	<form action=upload.php method=post enctype=multipart/form-data>
		<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
		<input type=file name=uploadfile>
		<input type=submit value=Загрузить>
	</form>
	<br>
	<form action=update.php method=post>
		<button value="update">Обновить расписание</button>	
	</form>
	
</body>
</html>