<?php 
    include_once('nav.php');
    include 'connection.php';
    $student_id= $_GET['id'];


    $countBC="SELECT COUNT(activities.activities_id) AS countBC FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='6'";
    $resultBC=$con->query($countBC);
    while ($row = $resultBC->fetch_assoc()) {
        $BC = $row['countBC'];
         }


    $countBS="SELECT COUNT(activities.activities_id) AS countBS FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='7'";
    $resultBS=$con->query($countBS);
    while ($row = $resultBS->fetch_assoc()) {
        $BS = $row['countBS'];
         }

   

    $countHD="SELECT COUNT(activities.activities_id) AS countHD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='1'";
        $resultHD=$con->query($countHD);
        while ($row = $resultHD->fetch_assoc()) {
        $HD = $row['countHD'];
         }

    $countPD="SELECT COUNT(activities.activities_id) AS countPD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='5'";
    $resultPD=$con->query($countPD);
        while ($row = $resultPD->fetch_assoc()) {
        $PD = $row['countPD'];
         }


    $countHD="SELECT COUNT(activities.activities_id) AS countHD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='1'";
    $resultHD=$con->query($countHD);
        while ($row = $resultHD->fetch_assoc()) {
        $HD = $row['countHD'];
         }



    $countAD="SELECT COUNT(activities.activities_id) AS countAD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='2'";
    $resultAD=$con->query($countAD);
        while ($row = $resultAD->fetch_assoc()) {
        $AD = $row['countAD'];
         }



    $countMD="SELECT COUNT(activities.activities_id) AS countMD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='3'";
    $resultMD=$con->query($countMD);
        while ($row = $resultMD->fetch_assoc()) {
            $MD = $row['countMD'];

        }



    $countCD="SELECT COUNT(activities.activities_id) AS countCD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='4'";
    $resultCD=$con->query($countCD);
        while ($row = $resultCD->fetch_assoc()) {
        $CD = $row['countCD'];
         }

    $countTotal="SELECT COUNT(activities.activities_id) AS countTotal FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id'";
    $resultTotal=$con->query($countTotal);
        while ($row = $resultTotal->fetch_assoc()) {
        $Total = $row['countTotal'];
        }

    

    $sql = "SELECT * FROM students  WHERE student_id = '$student_id' ";//ORDER BY คือการเรียงตามลำดับ ID
    $res_student = mysqli_query($con,$sql);
    $row_student = mysqli_fetch_assoc($res_student);

    

    



    

    
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
                                                        <?php echo $row_student['student_name']; ?> <?php echo $row_student['student_lastname']; ?><br>
                                                         <?php echo $row_student['student_id']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                                    <div class="breadcomb-report">
                                                        <a href="activities_show.php?id=<?= $row_student['student_id']; ?>"><button data-toggle="tooltip" data-placement="left"
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
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="breadcomb-wp">
                                                        
                                                        <div class="breadcomb-ctn">

                                                            <form action="reportStudentGo.php" method="get" enctype="multipart/form-data">
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
                                                                            
                                                                            
                                                                            
                                                                        <br><br>
                                                                    </div>
                                                                      
                                                                    <input type="hidden" name="student_id" value='<?php echo $student_id?>'>
                                                  
                                                            
                                                                        <center><button type="submit" class="btn btn-success notika-btn-success">ค้นหา</button></center>
                                                            </form>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                                   
                                                    
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


                                            <?php
    
                                                $dataPoints = array(
                                                    array("label"=> "กิจกรรมบังคับ", "y"=> $BC),
                                                    array("label"=> "กิจกรรมบังคับเลือก", "y"=> $BS),
                                                    array("label"=> "ด้าน MD", "y"=> $MD),
                                                    array("label"=> "ด้าน HD", "y"=> $HD),
                                                    array("label"=> "ด้าน PD", "y"=> $PD),
                                                    array("label"=> "ด้าน AD", "y"=> $AD),
                                                    array("label"=> "ด้าน CD", "y"=> $CD)
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
                                                        text: "การเข้าร่วมกิจกรรมในแต่ละด้าน"
                                                    },
                                                    subtitles: [{
                                                        text: "กิจกรรมที่เข้า <?php echo $Total ?> กิจกรรม"
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