<?php
    require 'connection.php'; 

    $activities_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link




    $sql = "DELETE FROM activities WHERE activities_id ='$activities_id'";//ลบครั้งแรก ชั้นแรก
    $result = mysqli_query($con, $sql);
    $sql = "DELETE FROM activities_join WHERE activities_id ='$activities_id'";//ลบครั้งสอง ชั้นสอง
    $result = mysqli_query($con, $sql);


    if(result){
        header("Location: activities.php");

    }else{
        echo "เกิดข้อผิดพลาด". mysqli_error($con);
    }

    mysqli_close($con);

?>