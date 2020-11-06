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
    <title>รายงานเจ้าหน้าที่</title>
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
										<i class="fa fa-user-secret"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>รายงานเจ้าหน้าที่</h2>
										<p>เจ้าหน้าที่ <span class="bread-ntd">และสโมสรนักศึกษา</span></p>
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

                      $countTotal="SELECT COUNT(emp_id) AS countTotal FROM employee ";
                      $resultcountTotal=$con->query($countTotal);
                      while ($row_countTotal = $resultcountTotal->fetch_assoc()) {
                      $countTotal = $row_countTotal['countTotal'];
                      // echo $row_countNews1['countNews1'];
                      }


                      $countEmp="SELECT COUNT(emp_id) AS countEmp FROM employee WHERE emp_status = 'EMPLOYEE'";
                      $resultcountEmp=$con->query($countEmp);
                      while ($row_countEmp = $resultcountEmp->fetch_assoc()) {
                      $countEmp = $row_countEmp['countEmp'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countAdmin="SELECT COUNT(emp_id) AS countAdmin FROM employee WHERE emp_status = 'ADMIN'" ;
                      $resultcountAdmin=$con->query($countAdmin);
                      while ($row_countAdmin = $resultcountAdmin->fetch_assoc()) {
                      $countAdmin= $row_countAdmin['countAdmin'];
                      // echo $row_countNews1['countNews1'];
                      }

                      $countUser="SELECT COUNT(emp_id) AS countUser FROM employee WHERE emp_status = 'USER'" ;
                      $resultcountUser=$con->query($countUser);
                      while ($row_countUser = $resultcountUser->fetch_assoc()) {
                      $countUser= $row_countUser['countUser'];
                      // echo $row_countNews1['countNews1'];
                      }
                    ?>
                    <?php
 
                        $dataPoints = array(
                          array("label"=> "แอดมิน", "y"=> $countAdmin),
                          array("label"=> "เจ้าหน้าที่", "y"=> $countEmp),
                          array("label"=> "สโมสรนักศึกษา", "y"=> $countUser),
                          
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
                            text: "ผู้ใช้งานระบบทั้งหมด"
                          },
                          subtitles: [{
                            text: "จำนวน <?php echo $countTotal ?> คน"
                          }],
                          data: [{
                            type: "pie",
                            showInLegend: "true",
                            legendText: "{label} ",
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