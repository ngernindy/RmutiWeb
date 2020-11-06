<?php
    // include 'connection.php';
    
    // $year = $_POST['yearselect'];
    $conn = mysqli_connect("localhost", "root", "1234", "projectrmuti");
    mysqli_query($conn,"SET NAMES TIS620");

    
    $year = $_POST['yearselect'];
    $group = $_POST['groupselect'];
    $subject = $_POST['subjectselect'];
    $class = $_POST['classselect'];
    $student_img = 'student.jpg';

                                     
        $fileName = $_FILES["file"]["tmp_name"];
        
        if ($_FILES["file"]["size"] > 0) {
            
            $file = fopen($fileName, "r");



           




        
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                $check = "SELECT  student_id FROM students  WHERE student_id = '" . $column[0] . "'";
                $result1 = mysqli_query($conn, $check) or die(mysqli_error());
                $num=mysqli_num_rows($result1);
            
                if($num > 0)
                {
                    echo "<script>";
                    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
                    echo "window.history.back();";
                    echo "</script>";
                }else{
                    $sqlInsert = "INSERT into students (student_id,student_password,student_name,student_lastname,student_gender,student_img,year_id,class_id,subject_id,group_id)
                    values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','$student_img','$year','$class','$subject','$group')";
                    $result = mysqli_query($conn, $sqlInsert);
                }
            }

          

                if($result){
                    echo "<script>";
                        echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
                        echo "window.history.go(-2)";
                    echo "</script>"; 
            
            
                }else{
                    echo "<script>";
                        echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
                        echo "window.history.back()";
                    echo "</script>"; 
                    
                }

            }  

        
        
        
    
    ?>

