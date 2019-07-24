<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: /");
	}

	if (!isset($_FILES['uploadfile'])) {
		echo 'Ошибка загрузки файла';
		exit();
	}

	// echo $_FILES['uploadfile']['tmp_name'];
	// echo '<br>';
	$uploaddir = 'C:\Users\NikitaSemenov\Downloads\OSPanel\domains\ttntl.ru\files\\';
	$filename = 'tt.xlsx';
	$uploadfile = $uploaddir . $filename;
	// echo $uploadfile;
	
	if (is_uploaded_file($_FILES['uploadfile']['tmp_name']) and move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
	    echo "Файл корректен и был успешно загружен.\n";
	} else {
	    echo "Возможная атака с помощью файловой загрузки!\n";
	}
?>