<?php
    include 'connection.php';
    
    $news_id = $_POST['news_id'];
    $newstype_id = $_POST['newstype'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
    $news_topic = $_POST['news_topic'];
    $news_detail = $_POST['news_detail'];
    $year_id = $_POST['year_id'];

    // $news_status = $_POST['news_status'];
    

    if(is_uploaded_file($_FILES['news_filename']['tmp_name'])){
        // ลบรูปเก่า
        $sql_select = "SELECT news_filename FROM news WHERE news_id='$news_id'";
        $result_image = mysqli_query($con,$sql_select);
        $row_image = mysqli_fetch_assoc($result_image);
        $image_old = $row_image ['news_filename'];
        unlink("news_image/".$image_old);
        //upload file
        $image_ext = pathinfo(basename($_FILES['news_filename']['name']), PATHINFO_EXTENSION); 
        $new_image_name = 'news_' .uniqid().".".$image_ext; //uniqid คือการ สุ่มชื่อให้ไม่ซ้ำกัน
        $image_path = "news_image/"; //เก็บรูปไว้ใน  "../news_image/";
        $image_upload_path = $image_path.$new_image_name;//เอาชื่อมาต่อกัน
        $success = move_uploaded_file($_FILES['news_filename']['tmp_name'],$image_upload_path);
        $sql_image ="UPDATE news SET news_filename='$new_image_name'WHERE news_id='$news_id'";
        mysqli_query($con,$sql_image);
        if($success==false){
            echo "ไม่สามารถ Upload รูปภาพได้";
            exit();

        }
    }
    //update data
    $sql = "UPDATE news SET news_topic ='$news_topic',news_detail='$news_detail',news_date=now(),newstype_id='$newstype_id',year_id = '$year_id'";
    $sql .=" WHERE news_id='$news_id'";

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