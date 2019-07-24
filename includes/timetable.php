<?php 
  $student_group = $_GET['student_group'];
  if (!isset($student_group)) {
    goto a;
  }
  $lessons = mysqli_query($connection, "SELECT * FROM `lessons` WHERE `student_group` = '$student_group'");
  $date = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `date`"))['date'];
?>
<table border="1" class = "table">
  <caption><?php echo $date ?></caption>
  <tr><th>№</th> <th>Бредмет</th><th>Мучитель</th> <th>Камера</th></tr>
  <?php 
    while ($cat = mysqli_fetch_assoc($lessons)) {
      echo  "<tr><td>" . $cat['lesson_id'] . "</td><td>" . $cat['tittle'] .  "</td><td>" . $cat['teacher'] . "</td><td>" . $cat['classroom'] . "</td></tr>";
    } 
  ?>
 
</table>
<?php 
  a:
?>
