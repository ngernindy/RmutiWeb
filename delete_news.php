<?php
    require 'connection.php'; 

    $news_id = $_GET['id']; //รับค่า id ที่ส่งมาจากการลบตาม link

    $sql_select = "SELECT news_filename FROM news WHERE news_id='$news_id'";
    $res_select = mysqli_query($con,$sql_select);
    $news_image = mysqli_fetch_row($res_select);
    $filename = $news_image[0];

    unlink('news_image/'.$filename);

    $sql = "DELETE FROM news WHERE news_id='$news_id'";
    $result = mysqli_query($con, $sql);

    if(result){
        header("Location: news.php");

    }else{
        echo "เกิดข้อผิดพลาด". mysqli_error($con);
    }

    mysqli_close($con);

?>