<?php 
    include_once('nav.php');
    require 'connection.php';

    if (!$_SESSION["emp_id"]){  //check session
      Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
    }else { if(isset($_SESSION['is_user'])){
        echo "<script>";
        echo "window.history.back()";
        echo "</script>"; 
    }else{
    
    ?>
<?php ?>


<?php 

    if (!$_SESSION["emp_id"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

    }else{?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>รายงานนักศึกษา</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        input[type=text], select {
          width: 100%;
          padding: 12px 12px;
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
										<i class="fa fa-group"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>รายงานนักศึกษา</h2>
										<p>สรุปกิจกรรมที่นักศึกษาเข้าร่วม</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<!-- <div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Inbox area Start-->
    <div class="inbox-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <?php 
                        include_once('navReport.php');
                    ?>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="view-mail-list sm-res-mg-t-30">
                    <?php 
                      $countBIS="SELECT COUNT(subject_id) AS countBIS FROM students WHERE subject_id = '1'" ;
                      $resultcountBIS=$con->query($countBIS);
                      while ($row_countBIS = $resultcountBIS->fetch_assoc()) {
                      $countBIS= $row_countBIS['countBIS'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countBAC="SELECT COUNT(subject_id) AS countBAC FROM students WHERE subject_id = '3'" ;
                      $resultcountBAC=$con->query($countBAC);
                      while ($row_countBAC = $resultcountBAC->fetch_assoc()) {
                      $countBAC= $row_countBAC['countBAC'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countBMG="SELECT COUNT(subject_id) AS countBMG FROM students WHERE subject_id = '7'" ;
                      $resultcountBMG=$con->query($countBMG);
                      while ($row_countBMG = $resultcountBMG->fetch_assoc()) {
                      $countBMG= $row_countBMG['countBMG'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countBMK="SELECT COUNT(subject_id) AS countBMK FROM students WHERE subject_id = '2'" ;
                      $resultcountBMK=$con->query($countBMK);
                      while ($row_countBMK = $resultcountBMK->fetch_assoc()) {
                      $countBMK= $row_countBMK['countBMK'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countBTH="SELECT COUNT(subject_id) AS countBTH FROM students WHERE subject_id = '5'" ;
                      $resultcountBTH=$con->query($countBTH);
                      while ($row_countBTH = $resultcountBTH->fetch_assoc()) {
                      $countBTH= $row_countBTH['countBTH'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countBLM="SELECT COUNT(subject_id) AS countBLM FROM students WHERE subject_id = '4'" ;
                      $resultcountBLM=$con->query($countBLM);
                      while ($row_countBLM = $resultcountBLM->fetch_assoc()) {
                      $countBLM= $row_countBLM['countBLM'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countTotal="SELECT COUNT(subject_id) AS countTotal FROM students " ;
                      $resultcountTotal=$con->query($countTotal);
                      while ($row_countTotal = $resultcountTotal->fetch_assoc()) {
                      $countTotal= $row_countTotal['countTotal'];
                      // echo $row_countNews1['countNews1'];
                      }
                     ?>
                    <?php
                          $dataPoints = array(
                            array("label"=> "ระบบสารสนเทศ", "y"=> $countBIS),
                            array("label"=> "บัญชี", "y"=> $countBAC),
                            array("label"=> "การจัดการ", "y"=> $countBMG),
                            array("label"=> "การตลาด", "y"=> $countBMK),
                            array("label"=> "ท่องเที่ยวและการบริการ", "y"=> $countBTH),
                            array("label"=> "โลจิสติกส์", "y"=> $countBLM),
                          );
                            
                          ?>
                          <!DOCTYPE HTML>
                          <html>
                          <head>  
                          <script>
                          window.onload = function () {
                            
                          var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            exportEnabled: true,
                            title:{
                              text: "นักศึกษาในแต่ละสาขา"
                            },
                            subtitles: [{
                              text: "นักศึกษาทั้งหมด <?php echo $countTotal ?> คน"
                            }],
                            data: [{
                              type: "pie",
                              showInLegend: "true",
                              legendText: "{label}",
                              indexLabelFontSize: 16,
                              indexLabel: "{label} - {y} คน",
                              // yValueFormatString: "฿#,##0",
                              dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                          });
                          chart.render();
                            
                          }
                          </script>
                          </head>
                          <body>
                          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                          </body>
                          </html> 

                         

                              <div class="data-table-area">
        
                                      <div class="row">
                                        <form action = "reportStu.php" method="get">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-element-list mg-t-30">
                                                  <div class="cmp-tb-hd">
                                                      <h2>ค้นหานักศึกษา</h2>
                                                  </div>
                                                  <div class="row">
                                                  <input type="text" size="40px" name="pro_search"placeholder="กรุณากรอกชื่อนักศึกษา">
                                                  <center><button class="btn btn-success notika-btn-success" name="submit" type="submit" id="submit">ค้นหา</button></center>


                                                      
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
                                                                    <!-- <th>โปรแกรมวิชา</th> -->
                                                                    <th>สาขา</th>
                                                                    <th>กลุ่มเรียน</th>
                                                                    <th></th>
                                                                    <!-- <th>แก้ไข</th>
                                                                    <th>ลบ</th> -->

                                                            </thead>
                                                            
                                                            <tbody>
                                                            <?php while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){?>                           
                                                        
                                                            
                                                                    
                                                                <tr>
                                                                    <td><a href="activities_show.php?id=<?= $row['student_id']; ?>"
                                                                            style="text-decoration: none"><h6><?php echo $row['student_id'];?></h6>
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
                                                                            style="text-decoration: none"><h6><?php echo $row['subject_name']; ?></h6>
                                                                    </td>
                                                                    <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                                            style="text-decoration: none"><?php echo $row['group_detaill']; ?>
                                                                    </td>
                                                                    <td><a href="student_show.php?id=<?= $row['student_id']; ?>"><i
                                                                                class="fa fa-search" style="font-size:26px;color:#00cc99"></i></button>
                                                                    </td>
                                                                    <td><a href="report_studentCh.php?id=<?= $row['student_id']; ?>"><i
                                                                                class="fa fa-pie-chart" style="font-size:26px;color:#00cc99"></i></button>
                                                                    </td>
                                                                    

                                                                </tr>
                                                            <?php }?> 
                                                            </tbody>
                                                            
                                                        </table>
                                                      </div>
                                                      <?php }else{}?>
                                                    </div>
                                              </div>
                                              
                                          </div>
                                          
                                        </form>
                                          
                                      </div>
                                  
                              </div>


                              <div class="data-table-area">
                                  
                                      <div class="row">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-element-list mg-t-30">
                                                  <div class="cmp-tb-hd">
                                                      
                                                      <br>
                                                  </div>
                                                  <div class="row">

                                                    <form action="report_select_student.php" method="get" enctype="multipart/form-data">
                                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                          <div class="nk-int-mk sl-dp-mn">
                                                              <div class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30">
                                                                  <h2>สาขาวิชา &nbsp;&nbsp;


                                                              </div>
                                                          </div>
                                                          <div >
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
                                                          <div >
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
                                                          


                                                              <div>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Inbox area End-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
    <?php 
      include_once('footer.php');
    ?>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
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
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
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
	<!-- tawk chat JS
		============================================ -->
</body>

</html>





    
<?php }?>
<?php }?>
<?php }?>