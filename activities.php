<?php include_once('nav.php');

    include_once('js_and_css.php');
    require 'connection.php';
    
    $sql = "SELECT * FROM activities INNER JOIN activities_type ON activities.atttype_id=activities_type.atttype_id ORDER BY activities_id DESC";//ORDER BY คือการเรียงตามลำดับ ID
    $res_activities = mysqli_query($con,$sql);


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
        <style>
            .ct {
                text-align: center;
            }
            
        </style>


        
        <title>จัดการข้อมูลกิจกรรม</title>
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
                                        <i class="fa fa-calendar-o" style="font-size:24px"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>จัดการข้อมูลกิจกรรม</h2>
                                        <p>กิจกรรม<span class="bread-ntd">ในแต่ละปีการศึกษา</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <a href="activities_add.php"><button data-toggle="tooltip" data-placement="left"
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
                              <h2>กิจกรรมทั้งหมด</h2>
                              <br>
                          </div>
                            
                                <table id="data-table-basic" class="table table-hover table-inbox" >
                                    <tr>
                                        <td>รหัสกิจกรรม</td>
                                        <td>หัวข้อกิจกรรม</td>
                                        <td>ประเภทกิจกรรม</td>
                                        <!-- <td>หน่วยกิต</td> -->
                                        <td>ปัการศึกษา</td>                                   
                                        <td>วันที่จัดกิจกรรม</td>
                                        <td>แก้ไข</td>
                                        <td>ลบกิจกรรม</td>
                                    </tr>
                                    <?php 
                                        while($row_activities = mysqli_fetch_assoc($res_activities)){
                                            
                                    ?>
                                    <tr>
                                        <td class="ct"><a href="activities_join.php?id=<?= $row_activities['activities_id']; ?>"style="text-decoration: none"><?php echo $row_activities['activities_id']; ?></td>
                                        <td><a href="activities_join.php?id=<?= $row_activities['activities_id']; ?>"style="text-decoration: none"><?php echo $row_activities['activities_topic']; ?></td>                         
                                        <td class="ct"><a href="activities_join.php?id=<?= $row_activities['activities_id']; ?>"style="text-decoration: none"><?php echo $row_activities['atttype_detail']; ?></td>
                                        <!-- <td class="ct"><a href="activities_join.php?id=<?= $row_activities['activities_id']; ?>"style="text-decoration: none"><?php echo $row_activities['activities_unit']; ?></td> -->
                                        <td class="ct"><a href="activities_join.php?id=<?= $row_activities['activities_id']; ?>"style="text-decoration: none"><?php echo $row_activities['activities_year']; ?></td>
                                        <td class="ct"><a href="activities_join.php?id=<?= $row_activities['activities_id']; ?>"style="text-decoration: none"><?php echo $row_activities['activities_date']; ?></td>
                                        <td class="ct"><a href="frm_update_activities.php?id=<?= $row_activities['activities_id']; ?>"><i class="fa fa-pencil" style="font-size:36px;color:green"></i></i></td>
                                        <td class="ct"><a href="delete_activities.php?id=<?= $row_activities['activities_id']; ?>" onclick="return confirm('คุณต้องการลบกิจกรรมนี้หรือไม่')"><i class="fa fa-trash-o" style="font-size:36px;color:red"></i></td>
                                        
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