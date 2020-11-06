<?php include_once('nav.php');

    include_once('js_and_css.php');
    require 'connection.php';

    $student_id= '58342110223-6';
    
   

    



?>
    <?php 
    if (!$_SESSION["emp_id"]){  //check session
        Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
    }else {  ?>
    <html lang="en">

      <head>
          <title>แสดงข้อมูลกิจกรรม</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

          <style>
          .colortable {
              border: 1px solid #ddd;
              padding: 8px;

          }
          table {
            width: 100%;
          }
          th {
              text-align: center;
          }
          .ct {
              text-align: center;
          }
          

          
          </style>

        </head>

        <body>


        <?php 
        $stu = "SELECT * FROM students WHERE student_id = '$student_id'"; 
        $res_stu = mysqli_query($con,$stu);
        
        while($row_stu = mysqli_fetch_assoc($res_stu)){
            if($row_stu['class_id']==1){ ?>
                    
                    <div>
                        <div class="container">
                            <h2>แสดงข้อมูลกิจกรรม</h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a" color="#FFFFFF">
                                        &nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมบังคับ&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6
                                                กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $BC = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id' AND atttype_id='6'";
                                $res_BC = mysqli_query($con,$BC);
                                while($row_activities_join = mysqli_fetch_assoc($res_BC)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['join_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>
                                <?php } ?>
                                
                            
                                
                                
                                <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                    &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                            <?php 
                                                $countBC="SELECT COUNT(activities.activities_id) AS countBC FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='6'";
                                                $resultBC=$con->query($countBC);
                                                while ($row = $resultBC->fetch_assoc()) {
                                                    $BC = $row['countBC'];
                                                    echo $row['countBC']; }
                                            ?>
                                            กิจกรรม&nbsp;จำนวนหน่วย: 
                                            <?php $sum_BC = "SELECT SUM(join_unit) AS TotalBC FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '6' AND student_id = '$student_id'"; 
                                                $result = $con->query($sum_BC);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['TotalBC'];
                                                }
                                            ?>
                                            หน่วย
                                    </font>
                                </td>
                                    
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมบังคับเลือก&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 5
                                                กิจกรรม และมีหน่วยไม่น้อยกว่า 20 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $BS = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='7'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_BS = mysqli_query($con,$BS);
                                while($row_activities_join = mysqli_fetch_assoc($res_BS)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['join_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>
                                    
                            
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                                <?php 
                                                $countBS="SELECT COUNT(activities.activities_id) AS countBS FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='7'";
                                                $resultBS=$con->query($countBS);
                                                    while ($row = $resultBS->fetch_assoc()) {
                                                        $BS = $row['countBS'];
                                                        echo $row['countBS']; }
                                                ?>
                                                กิจกรรม  &nbsp;จำนวนหน่วย:
                                                <?php $sum_BS = "SELECT SUM(join_unit) AS TotalBS FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '7' AND student_id = '$student_id'"; 
                                                    $result = $con->query($sum_BS);
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo $row['TotalBS'];
                                                    }
                                                ?>
                                                หน่วย
                                        </font>
                                    </td>
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมเลือกเข้าร่วม - PD
                                            ด้านการส่งเสริมและพัฒนาบุคลิกภาพ&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 2
                                                กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 58 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $PD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='5'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_PD = mysqli_query($con,$PD);
                                while($row_join_PD = mysqli_fetch_assoc($res_PD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_join_PD['activities_id']; ?></td>
                                        <td><?php echo $row_join_PD['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_join_PD['join_unit']; ?></td>
                                        <td class="ct"><?php echo $row_join_PD['activities_year']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    
                                    
                                        <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                            &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                                    <?php 
                                                $countPD="SELECT COUNT(activities.activities_id) AS countPD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='5'";
                                                $resultPD=$con->query($countPD);
                                                        while ($row = $resultPD->fetch_assoc()) {
                                                            $PD = $row['countPD'];
                                                            echo $row['countPD']; }
                                                    ?>
                                                    กิจกรรม &nbsp;จำนวนหน่วย:
                                                    <?php $sum_PD = "SELECT SUM(join_unit) AS TotalPD FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '5' AND student_id = '$student_id'"; 
                                                        $result = $con->query($sum_PD);
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo $row['TotalPD'];
                                                        }
                                                    ?>
                                                    หน่วย
                                                    

                                            </font>
                                        </td>
                                
                                    
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมเลือกเข้าร่วม - HD
                                            ด้านการส่งเสริมและพัฒนาสุขภาพกายและสุขภาพจิต&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 2
                                                กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 58 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $HD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='1'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_HD = mysqli_query($con,$HD);
                                while($row_activities_join = mysqli_fetch_assoc($res_HD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td ><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['join_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>
                            
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม : 
                                                <?php 
                                                $countHD="SELECT COUNT(activities.activities_id) AS countHD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='1'";
                                                $resultHD=$con->query($countHD);
                                                    while ($row = $resultHD->fetch_assoc()) {
                                                        $HD = $row['countHD'];
                                                        echo $row['countHD']; }
                                                ?>
                                                กิจกรรม &nbsp;จำนวนหน่วย:  
                                                <?php $sum_HD = "SELECT SUM(join_unit) AS TotalHD FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '1' AND student_id = '$student_id'"; 
                                                    $result = $con->query($sum_HD);
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo $row['TotalHD'];
                                                    }
                                                ?>  หน่วย
                                        </font>
                                    </td>
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมเลือกเข้าร่วม - AD
                                            ด้านการส่งเสริมและพัฒนาทักษะทางวิชาการหรือวิชาชีพ</strong>&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 2
                                                กิจกรรม มีหน่วยรวม 5 ด้านไม่น้อยกว่า 58 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $AD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id  WHERE student_id = '$student_id ' AND atttype_id='2'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_AD = mysqli_query($con,$AD);
                                while($row_activities_join = mysqli_fetch_assoc($res_AD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['join_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>
                                
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมที่อนุมัติการเข้าร่วม :
                                                <?php 
                                                $countAD="SELECT COUNT(activities.activities_id) AS countAD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='2'";
                                                $resultAD=$con->query($countAD);
                                                    while ($row = $resultAD->fetch_assoc()) {
                                                        $AD = $row['countAD'];
                                                        echo $row['countAD']; }
                                                ?>
                                                    กิจกรรม &nbsp;จำนวนหน่วย 
                                                <?php $sum_AD = "SELECT SUM(join_unit) AS TotalAD FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '2' AND student_id = '$student_id'"; 
                                                    $result = $con->query($sum_AD);
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo $row['TotalAD'];
                                                    }
                                                ?> หน่วย
                                        </font>
                                    </td>
                                

                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมเลือกเข้าร่วม - MD ด้านการส่งเสริมและพัฒนาคุณธรรม จริยธรรม
                                            ค่านิยม&nbsp;&nbsp;&nbsp;<span class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ :
                                                &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 2 กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 58 หน่วย
                                        </font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $MD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='3'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_MD = mysqli_query($con,$MD);
                                while($row_activities_join = mysqli_fetch_assoc($res_MD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['join_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>

                                
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :  
                                            <?php 
                                                $countMD="SELECT COUNT(activities.activities_id) AS countMD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='3'";
                                                $resultMD=$con->query($countMD);
                                                while ($row = $resultMD->fetch_assoc()) {
                                                echo $row['countMD']; }
                                            ?>&nbsp; กิจกรรม &nbsp;จำนวนหน่วย: 
                                            <?php $sum_MD = "SELECT SUM(join_unit) AS TotalMD FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '3' AND student_id = '$student_id'"; 
                                                $result = $con->query($sum_MD);
                                                while ($row = $result->fetch_assoc()) {
                                                $MD =$row['TotalMD'];
                                                echo $row['TotalMD'];
                                            }?>  หน่วย
                                        </font>
                                    </td>
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมเลือกเข้าร่วม - CD
                                            ด้านการส่งเสริมและอนุรักษ์ศิลปวัฒนธรรมและสิ่งแวดล้อม&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 2
                                                กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 58 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                    <?php 
                                    
                                        $CD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='4'";//ORDER BY คือการเรียงตามลำดับ ID
                                        $res_CD = mysqli_query($con,$CD);
                                        while($row_activities_join = mysqli_fetch_assoc($res_CD)){
                                    ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['join_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                    <?php } ?>
                                </thead>
                                
                                
                                <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                    &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                            
                                            <?php 
                                                // $countCD="SELECT COUNT(activities_id) AS countCD FROM activities_join  WHERE student_id = '$student_id'"; 
                                                // SELECT COUNT(activities_join.join_id) AS cou FROM activities_join INNER JOIN activities ON activities_join.activities_id = activities.activities_id  WHERE activities_join.student_id= '58342110223-6' AND activities.atttype_id = 6
                                                $countCD="SELECT COUNT(activities.activities_id) AS countCD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='4'";
                                                $resultCD=$con->query($countCD);
                                                while ($row = $resultCD->fetch_assoc()) {
                                                $CD = $row['countCD'];
                                                echo $row['countCD']; }
                                            ?> กิจกรรม จำนวนหน่วย:
                                            <?php $sum_CD = "SELECT SUM(join_unit) AS TotalCD FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '4' AND student_id = '$student_id'"; 
                                                $result = $con->query($sum_CD);
                                                while ($row = $result->fetch_assoc()) {
                                                echo $row['TotalCD'];} 
                                            ?>  หน่วย
                                    </font>
                                </td>
                            </table>
                        </div>
                        <div class="container">
                            <table class="table table-bordered colortable">
                                <thead>
                            
                                    <td class="colortable" height="30" align="center" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า : 100 หน่วย
                                            กิจกรรมที่เข้าร่วมทั้งหมด <span class="Text-Comment34">:
                                                <?php 
                                                    $counttotal="SELECT COUNT(activities_id) AS totalat FROM activities_join WHERE student_id='$student_id' "; 
                                                    $resulttotal=$con->query($counttotal);
                                                    while ($row = $resulttotal->fetch_assoc()) {
                                                    echo $row['totalat']; }?> 
                                                    กิจกรรม &nbsp; จำนวนหน่วย : 
                                                <?php 
                                        
            
                                                $sum_BC = "SELECT SUM(join_unit) AS Total FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = atttype_id AND student_id='$student_id'"; 
                                                    $result = $con->query($sum_BC);
                                                    while ($row = $result->fetch_assoc()) {
                                                        $Total =$row['Total'];
                                                        echo $row['Total'];}
                                                ?> หน่วย
                                                <br>
                                                <?php 
                                                    if($Total >= 100){
                                                        if($CD<2){
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน CD';
                                                        }else{}
                                                        if($AD<2){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน AD';
                                                        }else{}
                                                        if($PD<2){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน PD';
                                                        }else{}
                                                        if($HD<2){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน HD';
                                                        }else{}
                                                        if($MD<2){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน MD';
                                                        }else{}
                                                        if($BS<5){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมบังคับเลือก';
                                                        }else{}
                                                        if($BC<6){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมบังคับ';
                                                        }else{}
                                                        if(($BC>=6)&&($BS>=5)&&($MD>=2)&&($HD>=2)&&($PD>=2)&&($AD>=2)&&($CD>=2)){
                                                            echo 'ผ่านกิจกรรมตลอดหลักสูตรที่ศึกษา ติดต่อฝ่ายพัฒนานักศึกษา เพื่อขอใบแสดงผลการเข้าร่วมกิจกรรม';
                                                        }else{}
                                                    }else{
                                                        echo 'ยังไม่ผ่านกิจกรรมตลอดหลักสูตรที่ศึกษา';

                                                    }

                                                ?>
                                                

                                                </font>
                                    </td>
                                    </tbody>
                                    
                            </table>
                            <?php 
                            // if($student_id = $student_id){
                            //     echo '0';
                            // }else {echo '1';}
                            // echo $student_id;?>
                            
                        </div>
                    </div>

            <?php }
            else{ ?>

                    <div>
                        <div class="container">
                            <h2>แสดงข้อมูลกิจกรรม</h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a" color="#FFFFFF">
                                        &nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมบังคับ&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 4 กิจกรรม และมีหน่วยไม่น้อยกว่า 16 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $BC = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id' AND atttype_id='6'";
                                $res_BC = mysqli_query($con,$BC);
                                while($row_activities_join = mysqli_fetch_assoc($res_BC)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>
                                <?php } ?>
                                
                            
                                
                                
                                <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                    &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                            <?php 
                                                $countBC="SELECT COUNT(activities.activities_id) AS countBC FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='6'";
                                                $resultBC=$con->query($countBC);
                                                while ($row = $resultBC->fetch_assoc()) {
                                                    $BC = $row['countBC'];
                                                    echo $row['countBC']; }
                                            ?>
                                            กิจกรรม&nbsp;จำนวนหน่วย: 
                                            <?php $sum_BC = "SELECT SUM(activities_unit) AS TotalBC FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '6' AND student_id = '$student_id'"; 
                                                $result = $con->query($sum_BC);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['TotalBC'];
                                                }
                                            ?>
                                            หน่วย
                                    </font>
                                </td>
                                    
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมบังคับเลือก&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ไม่บังคับเข้าร่วม</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $BS = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='7'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_BS = mysqli_query($con,$BS);
                                while($row_activities_join = mysqli_fetch_assoc($res_BS)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>
                                    
                            
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                                <?php 
                                                $countBS="SELECT COUNT(activities.activities_id) AS countBS FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='7'";
                                                $resultBS=$con->query($countBS);
                                                    while ($row = $resultBS->fetch_assoc()) {
                                                        $BS = $row['countBS'];
                                                        echo $row['countBS']; }
                                                ?>
                                                กิจกรรม  &nbsp;จำนวนหน่วย:
                                                <?php $sum_BS = "SELECT SUM(activities_unit) AS TotalBS FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '7' AND student_id = '$student_id'"; 
                                                    $result = $con->query($sum_BS);
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo $row['TotalBS'];
                                                    }
                                                ?>
                                                หน่วย
                                        </font>
                                    </td>
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมเลือกเข้าร่วม - PD
                                            ด้านการส่งเสริมและพัฒนาบุคลิกภาพ&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 1 กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 14 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $PD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='5'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_PD = mysqli_query($con,$PD);
                                while($row_join_PD = mysqli_fetch_assoc($res_PD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_join_PD['activities_id']; ?></td>
                                        <td><?php echo $row_join_PD['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_join_PD['activities_unit']; ?></td>
                                        <td class="ct"><?php echo $row_join_PD['activities_year']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    
                                    
                                        <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                            &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                                    <?php 
                                                $countPD="SELECT COUNT(activities.activities_id) AS countPD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='5'";
                                                $resultPD=$con->query($countPD);
                                                        while ($row = $resultPD->fetch_assoc()) {
                                                            $PD = $row['countPD'];
                                                            echo $row['countPD']; }
                                                    ?>
                                                    กิจกรรม &nbsp;จำนวนหน่วย:
                                                    <?php $sum_PD = "SELECT SUM(activities_unit) AS TotalPD FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '5' AND student_id = '$student_id'"; 
                                                        $result = $con->query($sum_PD);
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo $row['TotalPD'];
                                                        }
                                                    ?>
                                                    หน่วย
                                                    

                                            </font>
                                        </td>
                                
                                    
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมเลือกเข้าร่วม - HD
                                            ด้านการส่งเสริมและพัฒนาสุขภาพกายและสุขภาพจิต&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 1 กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 14 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $HD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='1'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_HD = mysqli_query($con,$HD);
                                while($row_activities_join = mysqli_fetch_assoc($res_HD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td ><?php echo $row_activities_join['activities_topic']; ?></td>
                                        
                                        <td class="ct"><?php echo $row_activities_join['activities_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>
                            
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม : 
                                                <?php 
                                                $countHD="SELECT COUNT(activities.activities_id) AS countHD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='1'";
                                                $resultHD=$con->query($countHD);
                                                    while ($row = $resultHD->fetch_assoc()) {
                                                        $HD = $row['countHD'];
                                                        echo $row['countHD']; }
                                                ?>
                                                กิจกรรม &nbsp;จำนวนหน่วย:  
                                                <?php $sum_HD = "SELECT SUM(activities_unit) AS TotalHD FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '1' AND student_id = '$student_id'"; 
                                                    $result = $con->query($sum_HD);
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo $row['TotalHD'];
                                                    }
                                                ?>  หน่วย
                                        </font>
                                    </td>
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมเลือกเข้าร่วม - AD
                                            ด้านการส่งเสริมและพัฒนาทักษะทางวิชาการหรือวิชาชีพ</strong>&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 1 กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 14 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $AD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id  WHERE student_id = '$student_id ' AND atttype_id='2'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_AD = mysqli_query($con,$AD);
                                while($row_activities_join = mysqli_fetch_assoc($res_AD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>
                                
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมที่อนุมัติการเข้าร่วม :
                                                <?php 
                                                $countAD="SELECT COUNT(activities.activities_id) AS countAD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='2'";
                                                $resultAD=$con->query($countAD);
                                                    while ($row = $resultAD->fetch_assoc()) {
                                                        $AD = $row['countAD'];
                                                        echo $row['countAD']; }
                                                ?>
                                                    กิจกรรม &nbsp;จำนวนหน่วย 
                                                <?php $sum_AD = "SELECT SUM(activities_unit) AS TotalAD FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '2' AND student_id = '$student_id'"; 
                                                    $result = $con->query($sum_AD);
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo $row['TotalAD'];
                                                    }
                                                ?> หน่วย
                                        </font>
                                    </td>
                                

                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> กิจกรรมเลือกเข้าร่วม - MD ด้านการส่งเสริมและพัฒนาคุณธรรม จริยธรรม
                                            ค่านิยม&nbsp;&nbsp;&nbsp;<span class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ :
                                                &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 1 กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 14 หน่วย
                                        </font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $MD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='3'";//ORDER BY คือการเรียงตามลำดับ ID
                                $res_MD = mysqli_query($con,$MD);
                                while($row_activities_join = mysqli_fetch_assoc($res_MD)){
                                ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                <?php } ?>

                                
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :  
                                            <?php 
                                                $countMD="SELECT COUNT(activities.activities_id) AS countMD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='3'";
                                                $resultMD=$con->query($countMD);
                                                while ($row = $resultMD->fetch_assoc()) {
                                                echo $row['countMD']; }
                                            ?>&nbsp; กิจกรรม &nbsp;จำนวนหน่วย: 
                                            <?php $sum_MD = "SELECT SUM(activities_unit) AS TotalMD FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '3' AND student_id = '$student_id'"; 
                                                $result = $con->query($sum_MD);
                                                while ($row = $result->fetch_assoc()) {
                                                $MD =$row['TotalMD'];
                                                echo $row['TotalMD'];
                                            }?>  หน่วย
                                        </font>
                                    </td>
                            </table>
                        </div>
                        <div class="container">
                            <h2></h2><br>
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมเลือกเข้าร่วม - CD
                                            ด้านการส่งเสริมและอนุรักษ์ศิลปวัฒนธรรมและสิ่งแวดล้อม&nbsp;&nbsp;&nbsp;<span
                                                class="Text-Comment34">*&nbsp;&nbsp;หมายเหตุ : &nbsp;ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 1 กิจกรรม และมีหน่วยรวม 5 ด้านไม่น้อยกว่า 14 หน่วย</font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                    <?php 
                                    
                                        $CD = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='4'";//ORDER BY คือการเรียงตามลำดับ ID
                                        $res_CD = mysqli_query($con,$CD);
                                        while($row_activities_join = mysqli_fetch_assoc($res_CD)){
                                    ?>
                                    <tr>
                                        <td class="ct"><?php echo $row_activities_join['activities_id']; ?></td>
                                        <td><?php echo $row_activities_join['activities_topic']; ?></td>

                                        <td class="ct"><?php echo $row_activities_join['activities_unit']; ?></td>
                                        <td class="ct"><?php echo $row_activities_join['activities_year']; ?></td>
                                    </tr>

                                    <?php } ?>
                                </thead>
                                
                                
                                <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                    &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วม :
                                            
                                            <?php 
                                                // $countCD="SELECT COUNT(activities_id) AS countCD FROM activities_join  WHERE student_id = '$student_id'"; 
                                                // SELECT COUNT(activities_join.join_id) AS cou FROM activities_join INNER JOIN activities ON activities_join.activities_id = activities.activities_id  WHERE activities_join.student_id= '58342110223-6' AND activities.atttype_id = 6
                                                $countCD="SELECT COUNT(activities.activities_id) AS countCD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='4'";
                                                $resultCD=$con->query($countCD);
                                                while ($row = $resultCD->fetch_assoc()) {
                                                $CD = $row['countCD'];
                                                echo $row['countCD']; }
                                            ?> กิจกรรม จำนวนหน่วย:
                                            <?php $sum_CD = "SELECT SUM(activities_unit) AS TotalCD FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '4' AND student_id = '$student_id'"; 
                                                $result = $con->query($sum_CD);
                                                while ($row = $result->fetch_assoc()) {
                                                echo $row['TotalCD'];} 
                                            ?>  หน่วย
                                    </font>
                                </td>
                            </table>
                        </div>
                        <div class="container">
                            <table class="table table-bordered colortable">
                                <thead>
                            
                                    <td class="colortable" height="30" align="center" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"> ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า : 30 หน่วย
                                            กิจกรรมที่เข้าร่วมทั้งหมด <span class="Text-Comment34">:
                                                <?php 
                                                    $counttotal="SELECT COUNT(activities_id) AS totalat FROM activities_join WHERE student_id='$student_id' "; 
                                                    $resulttotal=$con->query($counttotal);
                                                    while ($row = $resulttotal->fetch_assoc()) {
                                                    echo $row['totalat']; }?> 
                                                    กิจกรรม &nbsp; จำนวนหน่วย : 
                                                <?php 
                                        
            
                                                $sum_BC = "SELECT SUM(activities_unit) AS Total FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = atttype_id AND student_id='$student_id'"; 
                                                    $result = $con->query($sum_BC);
                                                    while ($row = $result->fetch_assoc()) {
                                                        $Total =$row['Total'];
                                                        echo $row['Total'];}
                                                ?> หน่วย
                                                <br>
                                                <?php 
                                                    if($Total >= 30){
                                                        if($CD<1){
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน CD';
                                                        }else{}
                                                        if($AD<1){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน AD';
                                                        }else{}
                                                        if($PD<1){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน PD';
                                                        }else{}
                                                        if($HD<1){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน HD';
                                                        }else{}
                                                        if($MD<1){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมด้าน MD';
                                                        }else{}
                                                        if($BC<4){
                                                            echo '<br>';
                                                            echo 'ยังไม่ผ่านกิจกรรมบังคับ';
                                                        }else{}
                                                        if(($BC>=4)&&($MD>=1)&&($HD>=1)&&($PD>=1)&&($AD>=1)&&($CD>=1)){
                                                            echo 'ผ่านกิจกรรมตลอดหลักสูตรที่ศึกษา ติดต่อฝ่ายพัฒนานักศึกษา เพื่อขอใบแสดงผลการเข้าร่วมกิจกรรม';
                                                        }else{}
                                                    }else{
                                                        echo 'ยังไม่ผ่านกิจกรรมตลอดหลักสูตรที่ศึกษา';

                                                    }

                                                ?>
                                                

                                                </font>
                                    </td>
                                    </tbody>
                                    
                            </table>
                            <?php 
                            // if($student_id = $student_id){
                            //     echo '0';
                            // }else {echo '1';}
                            // echo $student_id;?>
                            
                        </div>
                    </div>
            
                

            <?php } 
        }?>
        

        
        </body>
        <?php
          include_once('footer.php'); 
        ?>

    </html>

<?php } ?>
