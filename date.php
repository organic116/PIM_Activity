<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fullcalendar 1</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/fullcalendar.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/fullcalendar.print.css" media='print' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style type="text/css">
    #calendar{
        max-width: 700px;
        margin: 0 auto;
        font-size:13px;
    }
    </style>
</head>
<body>
 <?php

//Database
$data = array();


$link = mysqli_connect("127.0.0.1", "tobedev", "1234", "tobedev_example");

mysqli_set_charset($link, 'utf8');

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$query = "SELECT * FROM tb_event";

if ($result = $link->query($query)) {

    /* fetch object array */
    while ($obj = $result->fetch_object()) {
       $data[] = array(
                    'id' => $obj->id,
                    'title'=> $obj->title,
                    'start'=> $obj->start,
                    'end'=> $obj->end
                    );
    }

    /* free result set */
    $result->close();
}

mysqli_close($link);

/*
$array = array(
            array('title'=> 'Long Event',
                    'start'=> '2015-02-07',
                    'end'=> '2015-02-10'),
            array('id'=> 999,
                    'title'=> 'Repeating Event',
                    'start'=> '2015-02-16T16:00:00')
         );
         */

?>

<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '<?php echo date('Y-m-d');?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events : <?php echo json_encode($data);?>
        });

    });

</script>
<h3>ทดสอบ Fullcalendar</h2>


<div id='calendar'></div>
<br>
<br>
<div style="margin:auto;width:800px;">
 <div id='calendar'></div>
 </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/lib/moment.min.js"></script>/
<script type="text/javascript" src="js/fullcalendar-2.1.1/fullcalendar.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/lang/th.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>

</html>
