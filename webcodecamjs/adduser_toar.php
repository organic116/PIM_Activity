<?php
	 $servername = "localhost";
	 $username ="id10717672_organic";
	 $password ="Tanakorn1340";
	 $db ="id10717672_dbactivities";
    $con = new mysqli($servername, $username, $password,$db);
            mysqli_set_charset($con,"utf8");
			date_default_timezone_set("Asia/Bangkok");
			$time_join= date("H:i:s");
            $user_idjoin= $_POST["scanned-QR"];
			$activities_id= $_POST['activities_join'];
            $id = substr($user_idjoin,9);
			$user_jo = "SELECT * FROM tb_joinac WHERE user_id ='".$id."' AND activities_id = '".$activities_id."' ";
			$querys=mysqli_query($con,$user_jo);
			if(mysqli_num_rows($querys) > 0)
			{
			echo "<script>";
                     echo "alert(\"เกิดข้อผิดพลาด : นักศึกษาได้เข้าร่วมกิจกรรมนี้ซ้ำกรุณาตรวจสอบ\");";
                      echo "window.history.back()"; // back page

                 echo "</script>";
				}
			else{
		$s="INSERT INTO tb_joinac(time_joinar,user_id,activities_id) VALUES('$time_join','$id','$activities_id')";


            $query=mysqli_query($con,$s);

			if(!$query)
			{


                die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!". mysqli_connect_error());


            }else{
                echo "<script>";
 echo "alert(\"เข้าร่วมกิจกรรมเรียบร้อย!\");";
 echo "window.location.href = document.referrer;";

 echo "</script>";

				}




			}
			?>
