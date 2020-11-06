<?php 
    include_once('nav.php');
    require 'connection.php';
    $year = $_GET['yearselect'];


    $countNews="SELECT COUNT(newstype_id) AS countNews FROM news WHERE year_id = '$year'";
    $resultcountNews=$con->query($countNews);
    while ($row_countNews = $resultcountNews->fetch_assoc()) {
    $countNews = $row_countNews['countNews'];
    // echo $row_countNews1['countNews1'];
    }

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
    <title>รายงานข่าว</title>
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
										<i class="fa fa-newspaper-o"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>รายงานข่าว</h2>
										<p>ข่าวทั้งหมด <span class="bread-ntd">ในปี <?php echo $year ?>  มี <?php echo $countNews ?> ข่าว</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                                    <a href="news.php"><button data-toggle="tooltip" data-placement="left" title="ดูข่าวทั้งหมด" class="btn"><i class="fa fa-newspaper-o"></i></button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Inbox area Start-->
    <?php
     

      $countNews1="SELECT COUNT(newstype_id) AS countNews1 FROM news WHERE newstype_id = '001' AND year_id = '$year'";
      $resultcountNews1=$con->query($countNews1);
      while ($row_countNews1 = $resultcountNews1->fetch_assoc()) {
      $countNews1 = $row_countNews1['countNews1'];
      // echo $row_countNews1['countNews1'];
      }

      $countNews2="SELECT COUNT(newstype_id) AS countNews2 FROM news WHERE newstype_id = '002' AND year_id = '$year' ";
      $resultcountNews2=$con->query($countNews2);
      while ($row_countNews2 = $resultcountNews2->fetch_assoc()) {
      $countNews2 = $row_countNews2['countNews2'];
      // echo $row_countNews1['countNews1'];
      }
    ?>
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
 
                        $dataPoints = array(
                          array("label"=> "ข่าวประชาสัมพันธ์", "y"=> $countNews1),
                          array("label"=> "ข่าวกิจกรรม", "y"=> $countNews2),
                          
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
                            text: "ข่าวทั้งหมด ในปี <?php echo $year ?>  มี <?php echo $countNews ?> ข่าว"
                          },
                          subtitles: [{
                            text: ""
                          }],
                          data: [{
                            type: "pie",
                            showInLegend: "true",
                            legendText: "{label}",
                            indexLabelFontSize: 16,
                            indexLabel: "{label} - {y} ข่าว",
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



                        <br>
                        <br>
                        <form action="reportNews.php" method="get" enctype="multipart/form-data">

                                  <div class="nk-int-mk sl-dp-mn">
                                      <div class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30">
                                            <h2>ปีการศึกษา &nbsp;&nbsp;
                                            </h2>
                                        </div>

                                    </div>

                                    <div class="col-lg-12 col-md-9 col-sm-9 col-xs-12"> 
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
                                                                                        
                                        <center><button type="submit" class="btn btn-success notika-btn-success">ค้นหา</button></center>
                          
                          </form>
                          <br>
                          <br>
                          

                         
                         

                              <div class="table-responsive">
                                  <table id="data-table-basic" class="table table-hover table-inbox">
                                    <thead>
                                      <tr>
                                         <td>รหัสข่าว</td>
                                         <td>หัวข้อข่าว</td>
                                         <td>ประเภทข่าว</td>
                                                                           

                                    </thead>
                                    <tbody>
                                       <?php 
                                          $sqlnews = "SELECT * FROM news INNER JOIN newstype on news.newstype_id = newstype.newstype_id  WHERE year_id = '$year' ORDER BY news_id DESC";//ORDER BY คือการเรียงตามลำดับ ID
                                           // $sql = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE group_id='13' ORDER BY student_username DESC";//ORDER BY คือการเรียงตามลำดับ ID
                                          //INNER JOIN student_subject ON students.subject_id=student_subject.subject_id  ORDER BY student_username
                                          $res_news = mysqli_query($con,$sqlnews);
                                              while($row_news = mysqli_fetch_assoc($res_news)){
                                                                                    
                                      ?>
                                         <tr>
                                            <td class="ct"><a href="news_detail.php?id=<?= $row_news['news_id']; ?>"style="color:#000000;"><?php echo $row_news['news_id']; ?></td>
                                            <td><a href="news_detail.php?id=<?= $row_news['news_id']; ?>"style="color:#000000;"><?php echo $row_news['news_topic']; ?></td>                         
                                            <td class="ct"><a href="news_detail.php?id=<?= $row_news['news_id']; ?>"style="color:#000000;"><?php echo $row_news['newstype_detail']; ?></td>
                                         </tr>
                                      <?php } ?>

                                    </tbody>
                                    
                                 </table>

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