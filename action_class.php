<?php
    include 'connection.php';
    
    $class_id = $_POST['class_id'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
   

   
    //insert data 
    $sql = "INSERT INTO students_class(class_student)";
    $sql .=" VALUES ('$class_id')";

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