<?php 
    include_once('nav.php');
    include 'connection.php';
    $sql = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id ORDER BY student_id DESC";//ORDER BY คือการเรียงตามลำดับ ID
    //INNER JOIN student_subject ON students.subject_id=student_subject.subject_id  ORDER BY student_username
    $res_student = mysqli_query($con,$sql);


   


    ?>
<?php 
if (!$_SESSION["emp_id"]){  //check session
	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else { if(isset($_SESSION['is_user'])){
    echo "<script>"; 
    echo "window.history.back()";
    echo "</script>"; 
    }else{
    ?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการข้อมูลนักศึกษา</title>

    <!-- favicon
      ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
      ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
      ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
      ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
      ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
      ============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
      ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- summernote CSS
      ============================================ -->
    <link rel="stylesheet" href="css/summernote/summernote.css">
    <!-- Range Slider CSS
      ============================================ -->
    <link rel="stylesheet" href="css/themesaller-forms.css">
    <!-- normalize CSS
      ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
      ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
      ============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- bootstrap select CSS
      ============================================ -->
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- datapicker CSS
      ============================================ -->
    <link rel="stylesheet" href="css/datapicker/datepicker3.css">
    <!-- Color Picker CSS
      ============================================ -->
    <link rel="stylesheet" href="css/color-picker/farbtastic.css">
    <!-- main CSS
      ============================================ -->
    <link rel="stylesheet" href="css/chosen/chosen.css">
    <!-- notification CSS
      ============================================ -->
    <link rel="stylesheet" href="css/notification/notification.css">
    <!-- dropzone CSS
      ============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
    <!-- wave CSS
      ============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
      ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- responsive CSS
      ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS

      ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        position: fixed;
        bottom: 250px;
        right: 500px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus {
        outline: none;
    }

    .btn {}

    .buttoncenter {
        margin: auto;
        display: block;

    }

    input[type=text], select {
      width: 50%;
      padding: 10px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    </style>

</head>

<body>


    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="fa fa-users" style="font-size:24px"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>จัดการข้อมูลนักศึกษา</h2>
                                        <p>รายชื่อนักศึกษา<span
                                                class="bread-ntd">คณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <a href="student_add.php"><button data-toggle="tooltip" data-placement="left"
                                            class="btn"><i class="fa fa-plus" style="font-size:14px;"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->

    <div class="data-table-area">
        <div class="container">
            <div class="row">
              <form action = "Students.php" method="get">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>ค้นหานักศึกษา</h2>
                        </div>
                        <div class="row">
                        <input type="text" size="40px" name="pro_search"placeholder="กรุณากรอกชื่อนักศึกษา">
                        <button class="btn btn-success notika-btn-success" name="submit" type="submit" id="submit">ค้นหา</button>


                            
                        </div>
                          <div>
                            <?php 
                          
                              if(isset($_GET['submit']))
                              { 
                                $pro_search = $_GET['pro_search'];
                                $p = '%'.$pro_search.'%';
                                // $q = "SELECT * FROM students WHERE student_name LIKE '$p'";
                                $q = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE student_name  LIKE '$p' or student_id LIKE '$p' or student_lastname  LIKE '$p' ORDER BY student_id DESC";
                                $result = mysqli_query($con,$q);?>                           

                            <br>
                            <br>
                            <div class="table-responsive">
                              <table id="data-table-basic" class="table table-hover table-inbox">
                                  <thead>
                                      <tr>
                                          <th>รหัสนักศึกษา</th>
                                          <th>ชื่อ</th>
                                          <th>นามสกุล</th>
                                          <th>ปีการศึกษา</th>
                                          <th>โปรแกรมวิชา</th>
                                          <th>สาขา</th>
                                          <th>กลุ่มเรียน</th>
                                          <th></th>
                                          <th>แก้ไข</th>
                                          <th>ลบ</th>

                                  </thead>
                                  
                                  <tbody>
                                  <?php while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){?>                           
                              
                                  
                                          
                                      <tr>
                                          <td><a href="activities_show.php?id=<?= $row['student_id']; ?>"
                                                  style="text-decoration: none"><?php echo $row['student_id'];?>
                                          </td>
                                          <td><a href="activities_show.php?id=<?= $row['student_id']; ?>"
                                                  style="text-decoration: none"><?php echo $row['student_name']; ?>
                                          </td>
                                          <td><a href="activities_show.php?id=<?= $row['student_id']; ?>"
                                                  style="text-decoration: none"><?php echo $row['student_lastname']; ?>
                                          </td>
                                          <td><a href="activities_show.php?id=<?= $row['student_id']; ?>"
                                                  style="text-decoration: none"><?php echo $row['year_id']; ?></td>
                                          <td><a href="activities_show.php?id=<?= $row['student_id']; ?>"
                                                  style="text-decoration: none">
                                                  <?php 
                                                  if($row['class_id']==1){
                                                      echo 'หลักสูตรปกติ';

                                                  }else{
                                                      echo 'หลักสูตรเทียบโอน';

                                                  } ?></td>

                                          <td><a href="activities_show.php?id=<?= $row['student_id']; ?>"
                                                  style="text-decoration: none"><?php echo $row['subject_name']; ?>
                                          </td>
                                          <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                  style="text-decoration: none"><?php echo $row['group_detaill']; ?>
                                          </td>
                                          <td><a href="student_show.php?id=<?= $row['student_id']; ?>"><i
                                                      class="fa fa-search" style="font-size:26px;color:#00cc99"></i></button>
                                          </td>
                                          <td><a href="frm_update_student.php?id=<?= $row['student_id']; ?>"><i
                                                      class="fa fa-pencil" style="font-size:26px;color:green"></i></i></td>
                                          <td><a href="delete_student.php?id=<?= $row['student_id']; ?>"
                                                  onclick="return confirm('คุณต้องการลบนักศึกษาคนนี้หรือไม่')"><i
                                                      class="fa fa-user-times" style="font-size:26px;color:red"></i></td>

                                      </tr>
                                  <?php }?> 
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <!-- <th>รหัสนักศึกษา</th>
                                          <th>ชื่อ</th>
                                          <th>นามสกุล</th>
                                          <th>ปีการศึกษา</th>
                                          <th>โปรแกรมวิชา</th>
                                          <th>สาขา</th>
                                          <th>กลุ่มเรียน</th>
                                          <th></th>
                                          <th>แก้ไข</th>
                                          <th>ลบ</th> -->
                                      </tr>
                                  </tfoot>
                              </table>
                            </div>
                            <?php }else{}?>
                          </div>
                    </div>
                    
                </div>
                
              </form>
                
            </div>
        </div>
    </div>


    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            
                            <br>
                        </div>
                        <div class="row">

                          <form action="select_student.php" method="get" enctype="multipart/form-data">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <div class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30">
                                        <h2>สาขาวิชา &nbsp;&nbsp;</h2>


                                    </div>
                                </div>
                                <div class="chosen-select-act fm-cmp-mg ">
                                    <select required class="chosen" name="subjectselect">
                                        <option value="" disabled selected>โปรดเลือกสาขาวิชา</option>
                                        <?php 
                                            $sql_students_subject = "SELECT * FROM student_subject";
                                            $res_students_subject = mysqli_query($con,$sql_students_subject);
                                            while ($row_students_subject = mysqli_fetch_assoc($res_students_subject)){
                                                echo '<option value="'.$row_students_subject['subject_id'].'">'.$row_students_subject['subject_name'].'</option>';
                                                
                                            }

                                          ?>





                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="2">
                                <div class="nk-int-mk sl-dp-mn">
                                    <div class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30">
                                        <h2>กลุ่มนักศึกษา &nbsp;&nbsp;</h2>

                                    </div>
                                </div>
                                <div class="chosen-select-act fm-cmp-mg">
                                    <select required class="chosen" name="groupselect">
                                        <option value="" disabled selected>โปรดเลือกกลุ่มเรียน</option>
                                        <?php 
                                            $sql_students_group = "SELECT * FROM student_group";
                                            $res_students_group = mysqli_query($con,$sql_students_group);
                                            while ($row_students_group = mysqli_fetch_assoc($res_students_group)){
                                                echo '<option value="'.$row_students_group['group_id'].'">'.$row_students_group['group_detaill'].'</option>';

                                                //////
                                                
                                                
                                            }

                                        ?>

                                    </select>
                                </div>



                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <div class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30">
                                        <h2>ปีการศึกษา &nbsp;&nbsp;
                                        </h2>
                                    </div>

                                </div>
                                


                                    <div class="chosen-select-act fm-cmp-mg">
                                        <select class="chosen" name="yearselect" required >
                                            <option value="" disabled selected>โปรดเลือกปีการศึกษา</option>
                                            <?php 
                                            $sql_student_year = "SELECT * FROM student_year";
                                            $res_student_year = mysqli_query($con,$sql_student_year);
                                            while ($row_student_year = mysqli_fetch_assoc($res_student_year)){
                                                echo '<option value="'.$row_student_year['year_id'].'">'.$row_student_year['year_id'].'</option>';
                                               
                                                
                                            }
                                            

                                        ?>


                                        </select>


                                    </div>
                                    
                                <br><br>
                            </div>
                            <center><button type="submit" class="btn btn-success notika-btn-success">ค้นหา</button></center>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>

    


    


    <div class="form-popup" id="myForm">
        <form method="post" action="action_subject.php" class="form-container">
            <label for="text"><b>เพิ่มสาขาวิชา</b></label>
            <input type="text" placeholder="โปรดใส่สาขาวิชา" name="subject_name" required>
            <div style="">
                <button type="submit" class="btn btn-success notika-btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-danger notika-btn-danger" onclick="closeForm()">ยกเลิก</button>
            </div>
        </form>
    </div>
    <script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>


    <div class="form-popup" id="myForm2">
        <form method="post" action="action_group.php" class="form-container">
            <label for="text"><b>เพิ่มกลุ่มเรียน</b></label>
            <input type="text" placeholder="โปรดใส่กลุ่มเรียน" name="group_detaill" required>
            <div>
                <div class="fm-checkbox">
                    <label><input type="radio" class="i-checks" value="1" checked name="class_id"> <i></i>
                        หลักสูตรปกติ</label>
                    &nbsp;&nbsp;&nbsp;
                    <label><input type="radio" class="i-checks" value="2" name="class_id"> <i></i>
                        หลักสูตรเทียบโอน</label>
                </div>
            </div>
            <div style="">
                <button type="submit" class="btn btn-success notika-btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-danger notika-btn-danger" onclick="closeForm2()">ยกเลิก</button>
            </div>

        </form>
    </div>
    <script>
    function openForm2() {
        document.getElementById("myForm2").style.display = "block";
    }

    function closeForm2() {
        document.getElementById("myForm2").style.display = "none";
    }
    </script>


    <div class="form-popup" id="myForm3">
        <form method="post" action="action_year.php" class="form-container">
            <label for="text"><b>เพิ่มปีการศึกษา</b></label>
            <input type="text" placeholder="โปรดใส่ปีการศึกษา" name="year_id" required>
            <div style="">
                <button type="submit" class="btn btn-success notika-btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-danger notika-btn-danger" onclick="closeForm3()">ยกเลิก</button>
            </div>
        </form>
    </div>
    <script>
    function openForm3() {
        document.getElementById("myForm3").style.display = "block";
    }

    function closeForm3() {
        document.getElementById("myForm3").style.display = "none";
    }
    </script>

 

    <br>
    <br><br><br><br><br>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
      ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
      ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
      ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
      ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
      ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
      ============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
      ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
      ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
      ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
      ============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
      ============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!-- Input Mask JS
      ============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>
    <!-- icheck JS
      ============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- rangle-slider JS
      ============================================ -->
    <script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="js/rangle-slider/rangle-active.js"></script>
    <!-- datapicker JS
      ============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
      ============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!--  color-picker JS
      ============================================ -->
    <script src="js/color-picker/farbtastic.min.js"></script>
    <script src="js/color-picker/color-picker.js"></script>
    <!--  notification JS
      ============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    <!--  summernote JS
      ============================================ -->
    <script src="js/summernote/summernote-updated.min.js"></script>
    <script src="js/summernote/summernote-active.js"></script>
    <!-- dropzone JS
      ============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!--  wave JS
      ============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  chosen JS
      ============================================ -->
    <script src="js/chosen/chosen.jquery.js"></script>
    <!--  Chat JS
      ============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
      ============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
      ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
      ============================================ -->
    <script src="js/main.js"></script>

    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>



</body>
<?php 
      include_once('footer.php');
  ?>

</html>
<?php }?>
<?php }?>