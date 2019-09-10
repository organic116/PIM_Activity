<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $sql = "SELECT
tb_user.major_id,
tb_major.major_id,
tb_major.major_name,
tb_major.faculty_id,
tb_major.major_status,
tb_major.course_id
FROM
tb_user
INNER JOIN tb_major ON tb_user.major_id = tb_major.major_id";
 $query = mysqli_query($con,$sql);
 while ($row = mysqli_fetch_assoc($query)) {
 echo $row["major_id"];
 echo $row["major_name"];
 }

 ?>
 </body>

</html>
