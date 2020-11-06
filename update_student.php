<?php
    include 'connection.php';
    $student_id = $_POST['student_id'];
    $student_password = $_POST['student_password'];
    $student_name = $_POST['student_name'];
    $student_lastname = $_POST['student_lastname'];
    $student_gender = $_POST['student_gender'];
    $student_telephone = $_POST['student_telephone'];
    $student_email = $_POST['student_email'];
    $student_address = $_POST['student_address'];
    $group_id = $_POST['group_id'];
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];
    $year_id = $_POST['year_id'];
    


    

  
    //update data
    $sql = "UPDATE students SET student_password='$student_password',student_name='$student_name',student_lastname='$student_lastname',student_gender ='$student_gender',student_telephone ='$student_telephone',student_email ='$student_email',student_address ='$student_address',group_id='$group_id',subject_id='$subject_id',year_id='$year_id',class_id='$class_id'";
    $sql .=" WHERE student_id='$student_id'";

    $result = mysqli_query($con,$sql);

    if($result){
        echo "<script>";
            echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
            echo "window.history.go(-2)";//ถอยหลัง 2 หน้า
        echo "</script>"; 

    }else{
        
        echo "<script>";
            echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con) \");"; 
            echo "window.history.back()";
        echo "</script>"; 

    }
?>