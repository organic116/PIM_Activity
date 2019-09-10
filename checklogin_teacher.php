<?php

	$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
	$user_name = mysqli_real_escape_string($conn,$_POST['personal_username']);
	$user_password = mysqli_real_escape_string($conn,sha1($_POST['personal_password']));
	$strSQL = "SELECT * FROM `personal` WHERE `personal_username`  = '".$user_name."' AND `personal_password` = '".$user_password."'";

	//$strSQL = "SELECT * FROM personal WHERE personal_username = '".mysqli_real_escape_string($conn,$_POST['personal_username'])."' and personal_password = '".mysqli_real_escape_string($conn,sha1($_POST['personal_password']))."'";
	$objQuery = mysqli_query($conn,$strSQL) or die("Error: ".mysqli_error($conn));
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

	if(!$objResult)
	{
		echo "<script>";
		echo "alert(\"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!\");";
		echo "window.location=\"login_teacher.php\"";
		echo "</script>";
	}
	else
	{

			{

				session_save_path("session/");
				session_start();

				if(isset($_POST["personal_username"]))
				{

					$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
					mysqli_query($conn, "SET NAMES UTF8");
					$personal_username=$_POST['personal_username'];
					$strSQL = "SELECT personal_id,personal_name,personal_username,personal_lastname,personal_status,dep_id,major_id FROM personal WHERE personal_username = '".$personal_username."'";
					$result = mysqli_query($conn,$strSQL);
					$objQuery = mysqli_query($conn,$strSQL) or die("Error: ".mysqli_error($conn));
						while($row = mysqli_fetch_array($result)) {
						$_SESSION["personal_id"]=$row["personal_id"];
						$_SESSION["personal_prefix"]=$row["personal_prefix"];
						$_SESSION["personal_name"]=$row["personal_name"];
						$_SESSION["personal_username"]=$row["personal_username"];
						$_SESSION["personal_lastname"]=$row["personal_lastname"];
						$_SESSION["personal_suffix"]=$row["personal_suffix"];
						$_SESSION["personal_status"]=$row["personal_status"];
						$_SESSION["major_id"]=$row["major_id"];
						$_SESSION["dep_id"]=$row["dep_id"];
						if($_SESSION["major_id"]>'1'){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                      header("Location: teacher_showuser.php");


                      }


                     else if ($_SESSION["major_id"]=='1'){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
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
