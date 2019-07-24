<?php 
	include "includes/db.php";
	$groups = mysqli_query($connection, "SELECT * FROM `groups`");
?>

<ul>
<?php
	while($cat = mysqli_fetch_assoc($groups)) {  
		$tittle = $cat['tittle'];
?>
	<li><a href="index.php?student_group=<?php echo $cat['tittle'] ?>"> <?php echo $tittle; ?> </a></li>
<?php 
	} 
?>
</ul>