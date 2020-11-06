<?php include_once('nav.php');

    include_once('js_and_css.php');
    require 'connection.php';
    
    $sql = "SELECT * FROM news INNER JOIN newstype ON news.newstype_id=newstype.newstype_id ORDER BY news_id DESC";//ORDER BY คือการเรียงตามลำดับ ID
    $res_news = mysqli_query($con,$sql);


?>
<?php 
if (!$_SESSION["emp_id"]){  //check session
	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{?>
<html>
    <head>
        
        <link rel="stylesheet" href="css/uikit.min.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/uikit.min.js"></script>
        <title>จัดการข้อมูลข่าว</title>
    </head>
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="fa fa-newspaper-o" style="font-size:24px"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>จัดการข้อมูลข่าวสาร</h2>
                                        <p>ข่าวสารกิจกรรม<span class="bread-ntd">และข่าวสารทั่วไป</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <a href="news_add.php"><button data-toggle="tooltip" data-placement="left"
                                            class="btn"><i class="fa fa-plus" style="font-size:14px;"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="data-table-area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-element-list mg-t-30">
                          <div class="cmp-tb-hd">
                              <h2>ข่าวสารทั้งหมด</h2>
                              <br>
                          </div>
                            
                                <table id="data-table-basic" class="table table-hover table-inbox" >
                                    <tr>
                                        <td>รหัสข่าว</td>
                                        <td>หัวข้อข่าว</td>
                                        <td>วันที่ลง</td>                                   
                                        <td>ประเภทข่าว</td>
                                        <td>แสดงข่าว</td>
                                        <td>แก้ไข</td>
                                        <td>ลบข่าว</td>
                                    </tr>
                                    <?php 
                                        while($row_news = mysqli_fetch_assoc($res_news)){
                                            
                                    ?>
                                    <tr>
                                        <td><a href="news_detail.php?id=<?= $row_news['news_id']; ?>"style="text-decoration: none"><?php echo $row_news['news_id']; ?></td>
                                        <td><a href="news_detail.php?id=<?= $row_news['news_id']; ?>"style="text-decoration: none"><?php echo $row_news['news_topic']; ?></td>
                                        <td><a href="news_detail.php?id=<?= $row_news['news_id']; ?>"style="text-decoration: none"><?php echo $row_news['news_date']; ?></td>
                                        <td><a href="news_detail.php?id=<?= $row_news['news_id']; ?>"style="text-decoration: none"><?php echo $row_news['newstype_detail']; ?></td>
                                        <?php if($row_news['show_status'] == '1'){ ?>
                                        <td><a href="show_news.php?id=<?= $row_news['news_id']; ?>"><i class="fa fa-eye" style="font-size:36px;color:black"></i></i></td>
                                        <?php }else{ ?>
                                            <td><a href="show_news.php?id=<?= $row_news['news_id']; ?>"><i class="fa fa-eye-slash" style="font-size:36px;color:black"></i></i></td>
                                        <?php }?>

                                        <td><a href="frm_update_news.php?id=<?= $row_news['news_id']; ?>"><i class="fa fa-pencil" style="font-size:36px;color:green"></i></i></td>
                                        <td><a href="delete_news.php?id=<?= $row_news['news_id']; ?>" onclick="return confirm('คุณต้องการลบข่าวนี้หรือไม่')"><i class="fa fa-trash-o" style="font-size:36px;color:red"></i></td>
                                        
                                    </tr>
                                        <?php } ?>
                                </table>
                      </div>                  
                  </div>
              </div>
          </div>
    </div>
    <?php 
    include_once('footer.php');
    ?>
    

    
  
    
</html>
<?php } ?>