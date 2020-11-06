<?php
    require 'connection.php'; 

    $group_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link

    $sql = "DELETE FROM student_group WHERE group_id ='$group_id'";
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