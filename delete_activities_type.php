<?php
    require 'connection.php'; 

    $atttype_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link

    $sql = "DELETE FROM activities_type WHERE atttype_id ='$atttype_id'";
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