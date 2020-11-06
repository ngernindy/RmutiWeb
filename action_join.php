<?php
    include 'connection.php';
    
    $student_id = $_POST['student_id'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
    $activities_id = $_POST['activities_id'];
    $activities_unit = $_POST['activities_unit'];


    
    // $student_id = $_GET['student_id'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
    // $activities_id = $_GET['activities_id'];
  
    //insert data


    // date_default_timezone_set('Asia/Bangkok');
    // $today_date=date("Y-m-d h:i:s: ");

    // $time_1 = "SELECT * FROM activities WHERE activities_id = '$activities_id'";
    // $res_time = mysqli_query($con,$time_1);
    // $row_time = mysqli_fetch_assoc($res_time);

    // if($today_date>=$row_time['activities_date']&&$today_date<=$row_time['time_out']){

        
    //         $sql = "INSERT INTO activities_join (student_id,activities_id,date_time)";
    //         $sql .=" VALUES ('$student_id','$activities_id',NOW())";

    //         $result = mysqli_query($con,$sql);

    //         if($result){
    //             echo "<script>";
    //                 echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
    //                 echo "window.history.back()";
    //             echo "</script>"; 

    //         }else{
    //             echo "<script>";
    //                 echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
    //                 echo "window.history.back()";
    //             echo "</script>"; 
                
    //         }
        

    // }else{

    //             echo "<script>";
    //                 echo "alert(\" หมดเวลาเข้าร่วมกิจกรรม\");"; 
    //                 echo "window.history.back()";
    //             echo "</script>"; 


    // }

    

    $extra = substr($activities_id,2);

    $extraS = "SELECT * FROM activities_join WHERE student_id = '$student_id'";
    $res_extra = mysqli_query($con,$extraS);
    $row_extra = mysqli_fetch_assoc($res_extra);

    // while($row_extra = mysqli_fetch_assoc($res_extra)){
    // $extra1 = $row_extra['activities_id'];
    // $extra2 = substr($extra1,2);

    // }
    $extra1 = $row_extra['activities_id'];
    $extra2 = substr($extra1,2);

    if(isset($extra2)){
        if($extra != $extra2){


        }else{
            $activities_unit = 'ไม่นับ';
        }
    }else{
        
    }

    


   


    
    





    $time_1 = "SELECT * FROM activities_join WHERE student_id = '$student_id' AND activities_id = '$activities_id'";
    $res_time = mysqli_query($con,$time_1);
    $row_time = mysqli_fetch_assoc($res_time);

    if($activities_id != $row_time['activities_id'] ){


        




        $sql = "INSERT INTO activities_join (student_id,activities_id,date_time,join_unit)";
        $sql .=" VALUES ('$student_id','$activities_id',NOW(),'$activities_unit')";

        $result = mysqli_query($con,$sql);

        if($result){
            echo "<script>";
                echo "alert(\" บันทึกข้อมูลเรียบร้อย \");"; 
                echo "window.history.back()";
            echo "</script>"; 

        }else{
            echo "<script>";
                echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
                echo "window.history.back()";
            echo "</script>"; 
            
        }

        
        

    }else{

        echo "<script>";
            echo "alert(\" มีรายชื่ออยู่ในระบบแล้ว\");"; 
            echo "window.history.back()";
        echo "</script>"; 


        


    }




    // $sql = "INSERT INTO activities_join (student_id,activities_id,date_time)";
    // $sql .=" VALUES ('$student_id','$activities_id',NOW())";

    // $result = mysqli_query($con,$sql);

    // if($result){
    //     echo "<script>";
    //         echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
    //         echo "window.history.back()";
    //     echo "</script>"; 

    // }else{
    //     echo "<script>";
    //         echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
    //         echo "window.history.back()";
    //     echo "</script>"; 
        
    // }
?>