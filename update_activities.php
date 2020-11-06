<?php
    include 'connection.php';
    $activities_id = $_POST['activities_id'];
    $activities_topic = $_POST['activities_topic'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
    $activities_unit = $_POST['activities_unit'];
    $term = $_POST['term'];
    $activities_year = $_POST['activities_year'];
    $activities_date = $_POST['activities_date'];
    $time_out = $_POST['time_out'];

    $lat = $_POST['lat'];
    $lng = $_POST['lng'];


    $atttype_id = $_POST['atttype'];
    

if($time_out > $activities_date){
  
    //update data
    $sql = "UPDATE activities SET activities_topic ='$activities_topic',activities_unit='$activities_unit',term_id='$term',activities_year='$activities_year',activities_date='$activities_date',atttype_id='$atttype_id',time_out='$time_out',lng='$lng',lat='$lat'";
    $sql .=" WHERE activities_id='$activities_id'";

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

}else{

    echo "<script>";
        echo "alert(\" ไม่สามารถเลือกวันที่สิ้นสุดก่อนเวลาเริ่มกิจกรรมได้\");"; 
        echo "window.history.back()";
    echo "</script>"; 

}
?>