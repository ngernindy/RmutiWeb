<?php
    include 'connection.php';

    $activities_id = $_POST['id_att'];
    $act_status = $_POST['act_status'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
    



    
    

  
    //update data
    $sql = "UPDATE activities SET act_status ='$act_status'";
    $sql .=" WHERE activities_id='$activities_id'";

    $result = mysqli_query($con,$sql);

    if($result){
        echo "<script>";
            echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
            echo "window.history.back()";
        echo "</script>"; 

    }else{
        
        echo "<script>";
            echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con) \");"; 
            echo "window.history.back()";
        echo "</script>"; 

    }
?>