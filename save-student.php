<?php
        require 'connection.php';
        
        $student_id = $_POST['student_id'];
        $student_password = $_POST['student_password'];
        $student_name = $_POST['student_name'];
        $student_lastname = $_POST['student_lastname'];
        $year_id = $_POST['year_id'];
        $group_id = $_POST['group_id'];
        $class_id = $_POST['class_id'];
        $subject_id = $_POST['subject_id'];
        $student_telephone = $_POST['student_telephone'];
        $student_email = $_POST['student_email'];
        $student_gender = $_POST['student_gender'];
        $student_img = $_POST['student_img'];


        $student_address = $_POST['student_address'];


       
    

        $query = "INSERT INTO students(student_id,student_password,student_name,student_lastname,student_telephone,student_email,year_id,group_id,class_id,subject_id,student_address,student_gender,student_img) VALUES('$student_id','$student_password','$student_name','$student_lastname','$student_telephone','$student_email','$year_id','$group_id','$class_id','$subject_id','$student_address','$student_gender','$student_img')";

        $result = mysqli_query($con,$query);
        
        if($result){
            echo "<script>";
            echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
            echo "window.history.go(-2)";//ถอยหลัง 2 หน้า
            echo "</script>"; 

        }else{
            echo"เกิดข้อผิดพลาด". mysqli_error($con);

        }
        
        $con = null;
        
         


?>