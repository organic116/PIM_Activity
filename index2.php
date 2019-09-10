<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ข้อมูลนักศึกษา</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style4.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>





</head>

 <body style="margin-top: 10px;">
 <?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $perpage = 50;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 $sql = "select * from tb_user limit {$start} , {$perpage} ";
 $query = mysqli_query($con, $sql);
 ?>
 <div class="container">
 <div class="row">
 <div class="col-lg-12">
 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>รหัสนักศึกษา</th>
 <th>ชื่อ</th>
 <th>นามสกุล</th>
 <th>คณะ</th>
 <th>สาขา</th>
 <th>ปีที่เข้าศึกษา</th>
 <th>สถานะ</th>
 <th>ฟังก์ชัน</th>
 </tr>
 </thead>
 <tbody>
 <?php while ($row = mysqli_fetch_assoc($query)) { ?>
 <tr>
 <td><?php echo $row['user_id']; ?></td>
 <td><?php echo $row['user_name']; ?></td>
 <td><?php echo $row['user_lastname']; ?></td>
  <td><?php echo '<center>';
     if ($row["faculty_id"]=='105')
     echo "วิศวกรรมศาสตร์และเทคโนโลยี";
     else($row["faculty_id"]=="") .  "</td> ";  ?></td>


 <td><?php  echo '<center>';
     if ($row["major_id"]=='701')

			 echo "วิศวกรรมคอมพิวเตอร์ ";
		else if($row["major_id"]=="")  "</td> ";

	 else if ($row["major_id"]=='702')
		echo "เทคโนโลยีสารสนเทศ ";
		else if($row["major_id"]=="")  "</td> ";

	else if ($row["major_id"]=='703')
		echo "วิศวกรรมอุตสาหการ ";
	else if($row["major_id"]=="")  "</td> ";

	else if($row["major_id"]=='704')
		echo "วิศวกรรมการผลิตยานยนต์ ";
	else if($row["major_id"]=="")  "</td> ";

	else if($row["major_id"]=='705')
		echo "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ ";
	else if($row["major_id"]=="")  "</td> ";

    echo "<td>" .'<center>'.$row["user_year"] .  "</td> "; ?></td>

 <td><?php echo '<center>';
     if ($row["user_status"]=='1')
		echo "ใช้งาน";
		else if ($row["user_status"]=='0')
		echo "ปิดใช้งาน";
		else($row["user_status"]=="") ; ?></td>

 <td><?php echo "<center><a href='user_showedit.php?stu_id=".$row["user_id"]."'><img src='img/edit_user.png' width= '25' height= '25' align='center' ></a><br>
	<a href='admin_edituser.php?stu_id=".$row["user_id"]."' ><img src='img/seeuser.png' width= '25' height= '25' align='center'  ></a>"; ?></td>

 </tr>
 <?php } ?>
 </tbody>
 </table>
 <?php
 $sql2 = "select * from tb_user ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>

 <nav>
 <div class="clearfix">
                    <div class="hint-text">Showing <b><?php echo  $perpage; ?></b> out of <b><?php echo $total_page; ?></b> entries</div>
                  <ul class="pagination">
 <li>
 <a href="index2.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="page-item"><a href="index2.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>
 <li >
 <a href="index2.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
                </div>


 </nav>
 </div>
 </div>
 </div> <!-- /container -->
 <script src="bootstrap/js/bootstrap.min.js"></script>
 </body>
</html>
