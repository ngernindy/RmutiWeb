<?php
    include 'connection.php';
    
    $subject_name = $_POST['subject_name'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
   

   
    //insert data 
    $sql = "INSERT INTO student_subject (subject_name)";
    $sql .=" VALUES ('$subject_name')";

    $result = mysqli_query($con,$sql);

    if($result){
        echo "<script>";
            echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
            echo "window.history.back()";
        echo "</script>"; 

    }else{
        echo "<script>";
            echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
            echo "window.history.back()";
        echo "</script>"; 
        
    }

?>