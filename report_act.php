<?php 
    include_once('nav.php');
    include 'connection.php';
    $activities_id= $_GET['id'];

    $sql = "SELECT * FROM activities  INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id INNER JOIN activities_type ON activities.atttype_id = activities_type.atttype_id WHERE activities.activities_id = $activities_id ";//ORDER BY คือการเรียงตามลำดับ ID
    $res_activities = mysqli_query($con,$sql);

    $countStudent="SELECT COUNT(student_id) AS countStudent FROM activities_join WHERE activities_id='$activities_id'";
    $resultcount=$con->query($countStudent);
    while ($row_cstudent = $resultcount->fetch_assoc()) {
    $Cstudent = $row_cstudent['countStudent'];
    // echo $row_cstudent['countStudent'];
    }

    // $countgender="SELECT COUNT(student_gender) AS countgender FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.student_gender = 'ชาย'";
    // $resultcount=$con->query($countgender);
    // while ($row_cgender = $resultcount->fetch_assoc()) {
    // $Cstudent = $row_cgender['countgender'];
    // echo $row_cgender['countgender'];
    // }

    // $countgender2="SELECT COUNT(student_gender) AS countgender2 FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.student_gender = 'หญิง'";
    // $resultcount2=$con->query($countgender2);
    // while ($row_cgender2 = $resultcount2->fetch_assoc()) {
    // $Cstudent2 = $row_cgender2['countgender2'];
    // echo $row_cgender2['countgender2'];
    // }

    $countBIS="SELECT COUNT(subject_id) AS countBIS FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.subject_id = '1'";
    $resultcountBIS=$con->query($countBIS);
    while ($row_countBIS = $resultcountBIS->fetch_assoc()) {
    $countBIS = $row_countBIS['countBIS'];
    // echo $row_countBIS['countBIS'];
    }

    $countBMG="SELECT COUNT(subject_id) AS countBMG FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.subject_id = '7'";
    $resultcountBMG=$con->query($countBMG);
    while ($row_countBMG = $resultcountBMG->fetch_assoc()) {
    $countBMG = $row_countBMG['countBMG'];
    // echo $row_countBMG['countBMG'];
    }

    $countBMK="SELECT COUNT(subject_id) AS countBMK FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.subject_id = '2'";
    $resultcountBMK=$con->query($countBMK);
    while ($row_countBMK = $resultcountBMK->fetch_assoc()) {
    $countBMK = $row_countBMK['countBMK'];
    // echo $row_countBMK['countBMK'];
    }


    $countBAC="SELECT COUNT(subject_id) AS countBAC FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.subject_id = '3'";
    $resultcountBAC=$con->query($countBAC);
    while ($row_countBAC = $resultcountBAC->fetch_assoc()) {
    $countBAC = $row_countBAC['countBAC'];
    // echo $row_countBAC['countBAC'];
    }


    $countBLM="SELECT COUNT(subject_id) AS countBLM FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.subject_id = '4'";
    $resultcountBLM=$con->query($countBLM);
    while ($row_countBLM = $resultcountBLM->fetch_assoc()) {
    $countBLM = $row_countBLM['countBLM'];
    // echo $row_countBLM['countBLM'];
    }

    $countBTH="SELECT COUNT(subject_id) AS countBTH FROM activities_join INNER JOIN students ON activities_join.student_id = students.student_id WHERE activities_id = $activities_id AND students.subject_id = '5'";
    $resultcountBTH=$con->query($countBTH);
    while ($row_countBTH = $resultcountBTH->fetch_assoc()) {
    $countBTH = $row_countBTH['countBTH'];
    // echo $row_countBTH['countBTH'];
    }

    



    

    
    ?>
<?php 
if (!$_SESSION["emp_id"]){  //check session
	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else { if(isset($_SESSION['is_user'])){
        echo "<script>";
        echo "alert(\"ไม่มีสิทธิ์เข้าถึง\");"; 
        echo "window.history.back()";
        echo "</script>"; 
    }else{
    ?>

        <!DOCTYPE html>

                <?php ($row_activities = mysqli_fetch_assoc($res_activities)) ?>

                <html>
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
                                                            <h2><?php echo $row_activities['activities_topic']; ?></h2>
                                                            <p>ประเภทกิจกรรม:<?php echo $row_activities['atttype_detail']; ?><span class="bread-ntd">&nbsp;&nbsp;หน่วยกิต:<?php echo $row_activities['activities_unit']; ?></span>&nbsp;&nbsp;ปีการศึกษา:<?php echo $row_activities['activities_year']; ?></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                                    <div class="breadcomb-report">
                                                        <a href="activities_join.php?id=<?= $row_activities['activities_id']; ?>"><button data-toggle="tooltip" data-placement="left"
                                                        title="ดูกิจกรรมนี้" class="btn" ><i class="fa fa-calendar-o" style="font-size:24px;"></i></button></a>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcomb-area">
                        <div class="container">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="breadcomb-list">
                                            <div class="row">


                                            <?php
 
                                            $dataPoints = array(
                                                array("label"=> "ระบบสารสนเทศ", "y"=> $countBIS),
                                                array("label"=> "บัญชี", "y"=> $countBAC),
                                                array("label"=> "การจัดการ", "y"=> $countBMG),
                                                array("label"=> "การตลาด", "y"=> $countBMK),
                                                array("label"=> "โลจิสติกส์", "y"=> $countBLM),
                                                array("label"=> "ท่องเที่ยวและการโรงแรม", "y"=> $countBTH),
                                                
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
                                                    text: "<?php echo $row_activities['activities_topic']; ?>"
                                                },
                                                subtitles: [{
                                                    text: "นักศึกษาที่เข้าร่วมกิจกรรมนี้ทั้งหมด  <?php echo $Cstudent ?>  คน"
                                                }],
                                                data: [{
                                                    type: "pie",
                                                    showInLegend: "true",
                                                    legendText: "{label}",
                                                    indexLabelFontSize: 16,
                                                    indexLabel: "{label} - {y} คน",

                                                    // indexLabel: "{label} - #percent%",
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





                                            







                                            <br><br><br><br><br><br>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="breadcomb-report">
                                                        <a href="pdf/join_act.php?id=<?= $row_activities['activities_id']; ?>"><button data-toggle="tooltip" data-placement="left"
                                                        title="พิมพ์" class="btn" ><i class="fa fa-print" style="font-size:24px;"></i></button></a>
                                                        
                                                    </div>
                                                    
                                            </div>
                                            <br>



                                                                                
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                                                            <table id="data-table-basic" class="table table-hover table-inbox">
                                                                                <thead>
                                                                                  <tr>
                                                                                      <td>ลำดับ</td>
                                                                                      <td>รหัส</td>
                                                                                      <td>ชื่อ</td>
                                                                                      <td>นามสกุล</td>
                                                                                      <td>สาขาวิชา</td>
                                                                                      <td>กลุ่ม</td>
                                                                                      <td>ปัการศึกษา</td>                                   
                                                                                  </tr>
                                                                                </thead>
                                                                                
                                                                                <tbody>
                                                                                <?php   $join = "SELECT * FROM activities_join INNER JOIN students ON activities_join.student_id=students.student_id INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id  WHERE activities_id='$activities_id' ";
                                                                                $res_join = mysqli_query($con,$join);
                                                                                // $row_join = mysqli_fetch_assoc($res_join);
                                                                                ?>
                                                                                <?php 
                                                                                $i = 1;
                                                                                while ($row=mysqli_fetch_array($res_join)){?>                           
                                                                            
                                                                                
                                                                                        
                                                                                  <tr>
                                                                                    <td><?php echo $i; ?></td>
                                                                                    <td><?php echo $row['student_id']; ?></td>
                                                                                    <td><?php echo $row['student_name']; ?></td>      
                                                                                    <td><?php echo $row['student_lastname']; ?></td>
                                                                                    <td><?php echo $row['subject_name']; ?></td>                                                  
                                                                                    <td><?php echo $row['group_detaill']; ?></td>                         
                                                                                    <td><?php echo $row['year_id']; ?></td>                         

                                                                             
                                                                                                                                                                                                                         
                                                                                  </tr>
                                                                                  
                                                                                <?php $i++; }?> 
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





                                        </div>
                                    </div>


                                                         




                                               
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php 
                        include_once('footer.php');
                    ?>
                </html>




<?php }?>
<?php }?>