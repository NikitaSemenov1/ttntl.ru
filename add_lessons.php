<?php  
	for ($i=1; $i <= 9; $i++) {
		if ($i % 2 == 1) {
		mysqli_query($connection, "INSERT INTO `lessons` (`student_group`, `lesson_id`, `tittle`, `classroom`, `teacher`) VALUES ('$tittle', '$i', 'мат', NULL, NULL);");
		} else {
			mysqli_query($connection, "INSERT INTO `lessons` (`student_group`, `lesson_id`, `tittle`, `classroom`, `teacher`) VALUES ('$tittle', '$i', NULL, NULL, NULL);");
		}
	}
				
?>