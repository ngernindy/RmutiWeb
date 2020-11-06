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
    <title>รายงานกิจกรรม</title>
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
										<i class="fa fa-calendar-o"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>รายงานกิจกรรม</h2>
										<p>กิจกรรมทั้งหมด<span class="bread-ntd">และผู้เข้าร่วมกิจกรรม</span></p>
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
                <?php 

                    $countBC="SELECT COUNT(activities_id) AS countBC FROM activities WHERE atttype_id = '6'" ;
                    $resultcountBC=$con->query($countBC);
                    while ($row_countBC = $resultcountBC->fetch_assoc()) {
                    $countBC= $row_countBC['countBC'];
                    // echo $row_countNews1['countNews1'];
                    }

                    $countBS="SELECT COUNT(activities_id) AS countBS FROM activities WHERE atttype_id = '7'" ;
                    $resultcountBS=$con->query($countBS);
                    while ($row_countBS = $resultcountBS->fetch_assoc()) {
                    $countBS= $row_countBS['countBS'];
                    // echo $row_countNews1['countNews1'];
                    }

                    $countHD="SELECT COUNT(activities_id) AS countHD FROM activities WHERE atttype_id = '1'" ;
                    $resultcountHD=$con->query($countHD);
                    while ($row_countHD = $resultcountHD->fetch_assoc()) {
                    $countHD= $row_countHD['countHD'];
                    // echo $row_countNews1['countNews1'];
                    }

                    $countCD="SELECT COUNT(activities_id) AS countCD FROM activities WHERE atttype_id = '4'" ;
                    $resultcountCD=$con->query($countCD);
                    while ($row_countCD = $resultcountCD->fetch_assoc()) {
                    $countCD= $row_countCD['countCD'];
                    // echo $row_countNews1['countNews1'];
                    }

                    $countMD="SELECT COUNT(activities_id) AS countMD FROM activities WHERE atttype_id = '3'" ;
                    $resultcountMD=$con->query($countMD);
                    while ($row_countMD = $resultcountMD->fetch_assoc()) {
                    $countMD= $row_countMD['countMD'];
                    // echo $row_countNews1['countNews1'];
                    }

                    $countAD="SELECT COUNT(activities_id) AS countAD FROM activities WHERE atttype_id = '2'" ;
                    $resultcountAD=$con->query($countAD);
                    while ($row_countAD = $resultcountAD->fetch_assoc()) {
                    $countAD= $row_countAD['countAD'];
                    // echo $row_countNews1['countNews1'];
                    }

                    $countPD="SELECT COUNT(activities_id) AS countPD FROM activities WHERE atttype_id = '5'" ;
                    $resultcountPD=$con->query($countPD);
                    while ($row_countPD = $resultcountPD->fetch_assoc()) {
                    $countPD= $row_countPD['countPD'];
                    // echo $row_countNews1['countNews1'];
                    }

                    $countTotal="SELECT COUNT(activities_id) AS countTotal FROM activities" ;
                    $resultcountTotal=$con->query($countTotal);
                    while ($row_countTotal = $resultcountTotal->fetch_assoc()) {
                    $countTotal= $row_countTotal['countTotal'];
                    // echo $row_countNews1['countNews1'];
                    }


                ?>
                

                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                    <div class="view-mail-list sm-res-mg-t-30">

                    <?php
 
                        $dataPoints = array(
                          array("label"=> "กิจกรรมบังคับ", "y"=> $countBC),
                          array("label"=> "กิจกรรมบังคับเลือก", "y"=> $countBS),
                          array("label"=> "CD", "y"=> $countCD),
                          array("label"=> "HD", "y"=> $countHD),
                          array("label"=> "PD", "y"=> $countPD),
                          array("label"=> "MD", "y"=> $countMD),
                          array("label"=> "AD", "y"=> $countAD)
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
                            text: "กิจกรรมทั้งหมด"
                          },
                          subtitles: [{
                            text: "รวมทุกด้าน <?php echo $countTotal ?> กิจกรรม"
                          }],
                          data: [{
                            type: "pie",
                            showInLegend: "true",
                            legendText: "{label}",
                            indexLabelFontSize: 16,
                            indexLabel: "{label} - {y} กิจกรรม",
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

                    
                    
                                                            <form action = "reportAct.php" method="get">
                                                              
                                                                  <div class="form-element-list mg-t-30">
                                                                      <div class="cmp-tb-hd">
                                                                          <h2>ค้นหากิจกรรม</h2>
                                                                      </div>
                                                                      <div class="row">
                                                                      <input type="text" size="40px" name="pro_search"placeholder="กรุณากรอกชื่อกิจกรรม">
                                                                      <center><button class="btn btn-success notika-btn-success" name="submit" type="submit" id="submit">ค้นหา</button></center>


                                                                          
                                                                      </div>
                                                                        <div>
                                                                          <?php 
                                                                        
                                                                            if(isset($_GET['submit']))
                                                                            { 
                                                                              $pro_search = $_GET['pro_search'];
                                                                              $p = '%'.$pro_search.'%';
                                                                              // $q = "SELECT * FROM students WHERE student_name LIKE '$p'";
                                                                              $q = "SELECT * FROM activities INNER JOIN activities_type ON activities.atttype_id=activities_type.atttype_id WHERE activities_id  LIKE '$p' or activities_topic LIKE '$p' or activities_year  LIKE '$p' or atttype_detail  LIKE '$p' ORDER BY activities_id DESC";
                                                                              $result = mysqli_query($con,$q);?>                           

                                                                          <br>
                                                                          <br>
                                                                          <div class="table-responsive">
                                                                            <table id="data-table-basic" class="table table-hover table-inbox">
                                                                                <thead>
                                                                                  <tr>
                                                                                      <td>รหัสกิจกรรม</td>
                                                                                      <td>หัวข้อกิจกรรม</td>
                                                                                      <td>ประเภทกิจกรรม</td>
                                                                                      <!-- <td>หน่วยกิต</td> -->
                                                                                      <td>ปัการศึกษา</td>                                   
                                                                                      <!-- <td>วันที่จัดกิจกรรม</td> -->
                                                                                  </tr>
                                                                                </thead>
                                                                                
                                                                                <tbody>
                                                                                <?php while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){?>                           
                                                                            
                                                                                
                                                                                        
                                                                                  <tr>
                                                                                    <td class="ct"><a href="report_act.php?id=<?= $row['activities_id']; ?>"style="color:#000000;"><?php echo $row['activities_id']; ?></td>
                                                                                    <td><a href="report_act.php?id=<?= $row['activities_id']; ?>"style="color:#000000;"><?php echo $row['activities_topic']; ?></td>                         
                                                                                    <td class="ct"><a href="report_act.php?id=<?= $row['activities_id']; ?>"style="color:#000000;"><?php echo $row['atttype_detail']; ?></td>
                                                                                    <td class="ct"><a href="report_act.php?id=<?= $row['activities_id']; ?>"style="color:#000000;"><?php echo $row['activities_year']; ?></td>
                                                                                                                                                                                                                         
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
                                                                  
                                                              
                                                              
                                                            </form>

                                                            <form action="report_act2.php" method="get" enctype="multipart/form-data">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                                                                    $sql_student_year = "SELECT * FROM student_year ORDER BY year_id DESC";
                                                                                    $res_student_year = mysqli_query($con,$sql_student_year);
                                                                                    while ($row_student_year = mysqli_fetch_assoc($res_student_year)){
                                                                                        echo '<option value="'.$row_student_year['year_id'].'">'.$row_student_year['year_id'].'</option>';
                                                                                        
                                                                                        
                                                                                    }
                                                                                    

                                                                                ?>


                                                                                </select>


                                                                            </div>
                                                                            
                                                                            
                                                                            
                                                                        
                                                                    </div>
                                                                      
                                                                    <input type="hidden" name="student_id" value='<?php echo $student_id?>'>
                                                  
                                                            
                                                                        <center><button type="submit" class="btn btn-success notika-btn-success">ค้นหา</button></center>
                                                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inbox area End-->
    <!-- Start Footer area-->
    <br>
    <br>
    <br>
    <br>
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