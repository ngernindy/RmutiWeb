<?php
    $year = $_GET['yearselect'];
    $group = $_GET['groupselect'];
    $subject = $_GET['subjectselect'];
    $class = $_GET['classselect'];

           
           
                                                        $conn = mysqli_connect("localhost", "root", "1234", "projectrmuti");
                                                        mysqli_query($conn,"SET NAMES TIS620");

                                                        // $year = $_GET['yearselect'];
                                                        // $group = $_GET['groupselect'];
                                                        // $subject = $_GET['subjectselect'];
                                                        // $class = $_GET['classselect'];


                                                        if (isset($_POST["import"])) {
                                                            
                                                            $fileName = $_FILES["file"]["tmp_name"];
                                                            
                                                            if ($_FILES["file"]["size"] > 0) {
                                                                
                                                                $file = fopen($fileName, "r");
                                                                
                                                                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                                                                    $sqlInsert = "INSERT into students (student_id,student_password,student_img,student_name,student_lastname,student_gender,year_id,class_id,subject_id,group_id)
                                                                        values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','$year','$class','$subject','$group')";
                                                                    $result = mysqli_query($conn, $sqlInsert);
                                                                    
                                                                    if (! empty($result)) {
                                                                        $type = "success";
                                                                        $message = "นำเข้าข้อมูลสำเร็จ";
                                                                    } else {
                                                                        $type = "error";
                                                                        $message = "นำเข้่าข้อมูลล้มเหลว";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        
                                                        ?>