<?php
    include 'connection.php';
    $news_id = $_GET['id'];
    // $activities_id = $_POST['id_att'];
    // $act_status = $_POST['act_status'];
 
  
    //update data
    $่show = "SELECT show_status FROM news WHERE news_id = '$news_id'";
    $res_show = mysqli_query($con,$่show);
    $row_show = mysqli_fetch_assoc($res_show);


    if($row_show['show_status']=='1'){

        $sql = "UPDATE news SET show_status ='0'";
        $sql .=" WHERE news_id='$news_id'";

    }else{
        $sql = "UPDATE news SET show_status ='1'";
        $sql .=" WHERE news_id='$news_id'";
    }

    $result = mysqli_query($con,$sql);

    if($result){
        echo "<script>";
            // echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
            echo "window.history.back()";
        echo "</script>"; 

    }else{
        
        echo "<script>";
            echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con) \");"; 
            echo "window.history.back()";
        echo "</script>"; 

    }
?>