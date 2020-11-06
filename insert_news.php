<?php
    include 'connection.php';
    
    $newstype_id = $_POST['newstype'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
    $news_topic = $_POST['news_topic'];
    $news_detail = $_POST['news_detail'];
    $year_id = $_POST['yearselect'];

    // $news_status = $_POST['news_status'];

    //upload file
    $image_ext = pathinfo(basename($_FILES['news_filename']['name']), PATHINFO_EXTENSION); 
    $new_image_name = 'news_' .uniqid().".".$image_ext; //uniqid คือการ สุ่มชื่อให้ไม่ซ้ำกัน
    $image_path = "news_image/"; //เก็บรูปไว้ใน  "../news_image/";
    $image_upload_path = $image_path.$new_image_name;//เอาชื่อมาต่อกัน
    $success = move_uploaded_file($_FILES['news_filename']['tmp_name'],$image_upload_path);
    if($success==false){
        echo "ไม่สามารถ Upload รูปภาพได้";
        exit();

    }
    //insert data
    $sql = "INSERT INTO news (news_topic,news_detail,news_filename,news_date,newstype_id,year_id)";
    $sql .=" VALUES ('$news_topic','$news_detail','$new_image_name',NOW(),'$newstype_id','$year_id')";

    $result = mysqli_query($con,$sql);

    


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

?>