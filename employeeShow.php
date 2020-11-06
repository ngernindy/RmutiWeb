<?php 
    include_once('nav.php');
    include_once('js_and_css.php');
    require 'connection.php';
    $emp_id = $_GET['id'];
    $sql = "SELECT * FROM employee WHERE emp_id='$emp_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_employee = mysqli_query($con,$sql);
    $row_employee = mysqli_fetch_assoc($res_employee);

?>

<style>


.circular--portrait {
  position: relative;
  width: 140px;
  height: 140px;
  overflow: hidden;
  border-radius: 50%;
}

.circular--portrait img {
  width: 100%;
  height: auto;
}
   
</style>

<div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-list sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="contact-win">
                            <!-- <div class="img-fluid img-thumbnail">
                                <img src="images/<?php echo $row_employee['emp_img']; ?>" alt="" width="180" height="50" />
                            </div> -->
                            <div class="circular--portrait">
                            <?php if(isset($row_employee['student_img'])){?>
                                <img src="images/<?php echo $row_employee['emp_img']; ?>" alt="" />
                            <?php }else{ ?>
                                <img src="img/post/4.jpg" alt="" />
                            <?php } ?>
                            


                            </div>
                            <div class="conct-sc-ic">
                                <a class="btn"  href="frm_updateEmp.php?id=<?php echo $_SESSION ['emp_id']; ?>"><i class="fa fa-edit"></i></a>
                            
                            </div>
                        </div>
                        <div class="contact-ctn">
							<div class="contact-ad-hd">
								<h2 class="center"><?php echo $row_employee['emp_name']; ?>  <?php echo $row_employee['emp_lastname']; ?></h2>
                                <p class="ctn-ads"><?php echo $row_employee['emp_username']; ?></p>
                                <p class="ctn-ads">เบอร์โทร: <?php echo $row_employee['emp_phone']; ?></p>
                                <p class="ctn-ads">อีเมล์: <?php echo $row_employee['emp_email']; ?></p>
                                <p class="ctn-ads">ตำแหน่ง: <?php echo $row_employee['emp_status']; ?></p>

							</div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12"></div>
            </div>
        </div>
</div>
<br>
<br>
<br>
<?php
    include_once('footer.php');
?>