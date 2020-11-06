<?php
    require 'connection.php'; 

    $employee_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link

    $sql = "DELETE FROM employee WHERE emp_id ='$employee_id'";
    $result = mysqli_query($con, $sql);
    

    if($result){
        echo "<script>";
            echo "alert(\" ลบข้อมูลเรียบร้อย\");"; 
            echo "window.history.go(-1)";
        echo "</script>";

    }else{
        echo "<script>";
            echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
            echo "window.history.back()";
        echo "</script>"; 
    }

    mysqli_close($con);

?>