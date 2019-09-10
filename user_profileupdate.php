
<?php
            $user_id=$_POST["user_id"];
            $user_mobile=$_POST["mobile"];
            $user_birthday=$_POST["birthday"];
            $user_address=$_POST["address"];
            $user_email=$_POST["email"];
            $user_password=$_POST["user_password"];
            $server =$_SERVER['localhost'];
            $username="id10717672_organic";
            $password="Tanakorn1340";
            $database="id10717672_dbactivities";
			$con=mysqli_connect($server,$username,$password,$database);
            mysqli_set_charset($con,"utf8");

            $sql="UPDATE tb_user SET user_id=' $user_id',
            user_tel=' $user_mobile',
		    user_date='$user_birthday',
            user_address='$user_address',
            user_email='$user_email',
		    user_password='$user_password'
		    WHERE user_id='$user_id'";


            $query=mysqli_query($con,$sql);

			if(!$query)
			{


                die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!". mysqli_connect_error());


            }else{
                echo "<script>";
				echo "alert(\"บันทึกเรียบร้อย\");";
				echo "window.location=\"user_profile.php\"";
				echo "</script>";

            }


						echo "<p align='center'><a href='admin_activesuimain.php'>กลับหน้าหลัก</a></p>";
                        echo "<p align='center'><a href='admin_uishowar.php'>หน้ากิจกรรม</a></p>";

				mysqli_close($con);




?>
