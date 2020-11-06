<?php
    require 'connection.php'; 

    $student_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link

    $sql = "DELETE FROM students WHERE student_id ='$student_id'";
    $result = mysqli_query($con, $sql);
    $sql = "DELETE FROM activities_join WHERE student_id ='$student_id'";//ลบครั้งสอง ชั้นสอง
    $result = mysqli_query($con, $sql);
    // $sql = "DELETE  $student_id FROM  students LEFT JOIN activities_join ON students.$student_id =activities_join.$student_id WHERE employee.user_id=person.user_id";
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