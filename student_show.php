<?php 
    include_once('nav.php');
    include_once('js_and_css.php');
    require 'connection.php';
    $student_id = $_GET['id'];
    $sql = "SELECT * FROM students INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE student_id='$student_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_student = mysqli_query($con,$sql);
    $row_student = mysqli_fetch_assoc($res_student);

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
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-list sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="contact-win">
                            <!-- <div class="img-fluid img-thumbnail">
                                <img src="images/<?php echo $row_student['student_img']; ?>" alt="" width="180" height="50" />
                            </div> -->
                            <div class="circular--portrait">
                           
                                <img src="images/<?php echo $row_student['student_img']; ?>" alt="" />
                           
                            


                            </div>
                            <div class="conct-sc-ic">
                                <a class="btn" href="#"><i class="notika-icon notika-facebook"></i></a>
                                <a class="btn" href="#"><i class="notika-icon notika-twitter"></i></a>
                                <a class="btn" href="#"><i class="notika-icon notika-pinterest"></i></a>
                            </div>
                        </div>
                        <div class="contact-ctn">
							<div class="contact-ad-hd">
								<h2 class="center"><?php echo $row_student['student_name']; ?>  <?php echo $row_student['student_lastname']; ?></h2>
                                <p class="ctn-ads"><?php echo $row_student['student_id']; ?></p>
                                <p class="ctn-ads">เพศ: <?php echo $row_student['student_gender']; ?></p>
                                <p class="ctn-ads">สาขา: <?php echo $row_student['subject_name']; ?></p>
                                <p class="ctn-ads">กลุ่มเรียน: <?php echo $row_student['group_detaill']; ?></p>
                                <p class="ctn-ads">ปีการศึกษา: <?php echo $row_student['year_id']; ?></p>

							</div>
                            <p>ที่อยู่: <?php echo $row_student['student_address']; ?></p>
                        </div>
                        <div class="social-st-list">
                            <div class="social-sn">
                                <h2>อีเมล์</h2>
                                <p><?php echo $row_student['student_email']; ?></p>
                            </div>
                            <div class="social-sn">
                                <h2>เบอร์โทร</h2>
                                <p><?php echo $row_student['student_telephone']; ?></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
            </div>
        </div>
</div>
<?php
    include_once('footer.php');
?>