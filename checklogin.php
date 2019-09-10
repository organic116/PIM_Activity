<?php

	$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
	$strSQL = "SELECT * FROM tb_user WHERE user_id = '".mysqli_real_escape_string($conn,$_POST["user_id"])."'
	and user_password = '".mysqli_real_escape_string($conn,$_POST["user_password"])."'";
	$objQuery = mysqli_query($conn,$strSQL) or die("Error: ".mysqli_error($conn));
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "<script>";
			echo "alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!');";
			echo "window.location=\"login.php\"";
			echo "</script>";

	}
	else
	{

			{
				session_save_path("session/");
				session_start();

				if(isset($_POST["user_id"]))
				{

					$conn = mysqli_connect("localhost", "id10717672_organic", "Tanakorn1340", "id10717672_dbactivities");
					mysqli_query($conn, "SET NAMES UTF8");
					$user_id=$_POST["user_id"];
					$strSQL = "SELECT user_id,
					user_password,
					user_name,
					user_status,
					user_prefix,
					user_lastname,
					major_id,
					faculty_id,
					user_area,
					user_room,
					course_id,
					user_year,
					user_date,
					user_address,
					user_tel,
					user_email,
					user_club,
					user_status,
					user_qrcode,
					user_imgqrcode,
					image FROM tb_user WHERE user_id = '".$user_id."'";
					$result = mysqli_query($conn,$strSQL);
					$objQuery = mysqli_query($conn,$strSQL) or die("Error: ".mysqli_error($conn));
						while($row = mysqli_fetch_array($result)) {
						$_SESSION["user_id"]=$row["user_id"];
						$_SESSION["user_name"]=$row["user_name"];
						$_SESSION["user_lastname"]=$row["user_lastname"];
						$_SESSION["major_id"]=$row["major_id"];
						$_SESSION["faculty_id"]=$row["faculty_id"];
						$_SESSION["user_area"]=$row["user_area"];
						$_SESSION["user_room"]=$row["user_room"];
						$_SESSION["course_id"]=$row["course_id"];
						$_SESSION["user_year"]=$row["user_year"];
						$_SESSION["user_date"]=$row["user_date"];
						$_SESSION["user_address"]=$row["user_address"];
						$_SESSION["user_tel"]=$row["user_tel"];
						$_SESSION["user_email"]=$row["user_email"];
						$_SESSION["user_club"]=$row["user_club"];
						$_SESSION["user_qrcode"]=$row["user_qrcode"];
						$_SESSION["image"]=$row["image"];
						$_SESSION["user_imgqrcode"]=$row["user_imgqrcode"];
						$_SESSION["user_status"]=$row["user_status"];

						if($_SESSION["user_status"]=='1'){

                      header("Location: user_joinavi.php");


                      }


                     else if ($_SESSION["user_status"]=='3'){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
 					echo "<script>";
                      echo "alert(\" ไม่มีสิทธิ์ในการเข้าใช้ระบบ\");";
                      echo "window.history.back()";
 					echo "</script>";
                      }else{
                    echo "<script>";
                     echo "alert(\" username หรือ  password ไม่ถูกต้อง\");";
                      echo "window.history.back()"; // back page
                 echo "</script>";
						}

		}
				}
			}
	}
	mysqli_close($conn);

?>
