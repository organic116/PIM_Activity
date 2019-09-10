<?
	$calTime = getdate(date(mktime(date("H") + $diffHour,
    date("i") + $diffMinute)));
	$month = $calTime["mon"];      //เดือน
  	$year = $calTime["year"];


	$calyear=$year + 543;
	$y =  substr($calyear,2,2);
	  if($month < 10 ){$m = "0".$month;}
	  else{$m = $month;}
	//ค้นหาปีและเดือนที่ลางานปัจจุบัน


	$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
	 mysqli_query($con, "SET NAMES UTF8");
$search_l = $y.$m;
$event_array=array();
	$sql = "select * from Schedule_leave,Employee where Employee.EmpId = Schedule_leave.EmpId AND schedule_id LIKE '$search_l%' ORDER BY D_start";
	$result = mysql_db_query($dbname,$sql);
	$i =0;
	$Num_Rows = mysql_num_rows($result);

	while($dbarr = mysql_fetch_array($result,MYSQL_ASSOC))
	{
		$d_starty = (substr($dbarr[D_start],0,4)) - 543;
		$d_startm = (substr($dbarr[D_start],5,2));
		$d_startd = (substr($dbarr[D_start],8,2));
		$d_endy = (substr($dbarr[D_End],0,4)) - 543;
		$d_endm = (substr($dbarr[D_End],5,2));
		$d_endd = (substr($dbarr[D_End],8,2));

		$urls="../VivaClinic/Admin_AddSchedule.php?id_leave=";

		$d_start = $d_starty."-".$d_startm."-".$d_startd;
		$d_end = $d_endy."-".$d_endm."-".$d_endd;

		 $eventArray['id'] = $dbarr[schedule_id];
		 $eventArray['title'] = $dbarr[EmpId]."  ".$dbarr[EmpName];
   		 $eventArray['start'] = $d_start;
   		 $eventArray['end'] = $d_end;
     	 $eventArray['url'] = $urls;
	   	 array_push($event_array,$eventArray);

	}
	echo json_encode($event_array);

?>
