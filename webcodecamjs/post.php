
<?php
        $user_idjoin= $_POST["scanned-QR"];
        $id = substr($user_idjoin,9);
        //$id = "5852300420";

        $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
        mysqli_query($con, "SET NAMES UTF8");
        //$sql = "SELECT tb_user FROM user_id WHERE user_id = '".$id."'";
        $user_check = "SELECT * FROM tb_user WHERE user_id ='".$id."'";
        $result=mysqli_query($con,$user_check ) or die("�Դ��ͼԴ��Ҵ㹡�ä���").mysqli_error();
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_array($result);
            echo json_encode($row);
        }
?>
