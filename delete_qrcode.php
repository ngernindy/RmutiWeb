<?php
    require 'connection.php'; 

    // $activities_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link
    $qrcode_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link


    

    $sql = "DELETE FROM qrcodes WHERE qrcode_id='$qrcode_id'";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "<script>";
            echo "window.history.back()";
        echo "</script>"; 
    }else{
        echo "เกิดข้อผิดพลาด". mysqli_error($con);
    }

    mysqli_close($con);

?>