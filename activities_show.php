<?php include_once('nav.php');

    include_once('js_and_css.php');
    require 'connection.php';

    $student_id= $_GET['id'];


   
    
   

    



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
          .textR {
            text-align: right;
            }
          

          
          </style>

        </head>

        <body>
        <div>
            <div class="container">
            <h2>แสดงข้อมูลกิจกรรม</h2><br>
            </div>


        <?php
        $typee= "SELECT * FROM activities_type ";
        $res_type = mysqli_query($con,$typee);
        while($row_activities_type = mysqli_fetch_assoc($res_type))
        {
        $act = $row_activities_type['atttype_id'] ;
        

            $student= "SELECT * FROM students WHERE student_id = '$student_id'";
            $res_student = mysqli_query($con,$student);
            while($row_student = mysqli_fetch_assoc($res_student))
            {
                $class_id = $row_student['class_id'] ;
            }


                $textact= "SELECT * FROM text_activities WHERE class_id ='$class_id' AND atttype_id = '$act'";
                $res_textact = mysqli_query($con,$textact);
                while($row_activities_textact = mysqli_fetch_assoc($res_textact))
                {
         ?>





        

                    
                    <div>
                        <div class="container">
                            <!-- <h2>แสดงข้อมูลกิจกรรม</h2><br> -->
                            <!-- <p>กิจกรรมบังคับ   *  หมายเหตุ :  ต้องเข้าร่วมกิจกรรมไม่น้อยกว่า 6 กิจกรรม และมีหน่วยไม่น้อยกว่า 22 หน่วย</p>             -->

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="5" valign="middle" bgcolor="#04ca9a" color="#FFFFFF">
                                        &nbsp;&nbsp;
                                        &nbsp;&nbsp;<font color="#FFFFFF"><?php echo $row_activities_textact['topic']; ?>&nbsp;<?php echo $row_activities_textact['text1']; ?>&nbsp;&nbsp;<span
                                                class="Text-Comment34">&nbsp;&nbsp;<?php echo $row_activities_textact['text2']; ?></font>
                                    </td>

                                    <tr>
                                        <th>รหัสกิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>หน่วย</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                $BC = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id' AND atttype_id='$act'";
                                $res_BC = mysqli_query($con,$BC);
                                while($row_activities_join = mysqli_fetch_assoc($res_BC))
                                    {
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
                                                $countBC="SELECT COUNT(activities.activities_id) AS countBC FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='$act'";
                                                $resultBC=$con->query($countBC);
                                                while ($row_count = $resultBC->fetch_assoc()) {
                                                    $coutunit = $row_count['countBC'];
                                                    echo $row_count['countBC'];}
                                            ?>
                                            กิจกรรม&nbsp;จำนวนหน่วย: 
                                            <?php $sum_BC = "SELECT SUM(join_unit) AS TotalBC FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE atttype_id = '$act' AND student_id = '$student_id'"; 
                                                $result = $con->query($sum_BC);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $row['TotalBC'];
                                                }
                                            ?>
                                            หน่วย&nbsp;&nbsp;&nbsp;
                                            
                                            <?php 
                                                $countBC="SELECT COUNT(activities.activities_id) AS countBC FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='$act'";
                                                $result_count = mysqli_query($con,$countBC);
                                                while($row_count= mysqli_fetch_assoc($result_count))
                                                {
                                                    $coutunit = $row_count['countBC'];
                                                

                                                }

                                                $calcu= "SELECT * FROM cal INNER JOIN total_unit on cal.class_id = total_unit.class_id INNER JOIN activities_type on cal.atttype_id = activities_type.atttype_id  WHERE cal.class_id = '$class_id' AND activities_type.atttype_id = '$act'"; 
                                                $result_cal = $con->query($calcu);
                                                while ($row_cal = $result_cal->fetch_assoc()) {
                                                    $cal =$row_cal['cal_detail'];
                                                    

                                                }

                                                   
                                                    $ee = $cal - $coutunit;
                                                    if($ee <= 0){
                                                        $ee = 0;
                                                        echo '<i class="fa fa-check" style="font-size:20px;color:green"></i><font color="#0f3e0f" > ผ่านกิจกรรมนี้แล้ว </font>';

                                                    }else{
                                                        echo '<i class="fa fa-exclamation" style="font-size:20px;color:red"></i> <font class ="ct" color="#f60909">เหลือกิจกรรมที่ยังไม่เข้าร่วม&nbsp;'.$ee.'&nbsp;กิจกรรม</font>';
                                                    }
 
                                            ?>


                                          
                                    </font>
                                           
                                </td>
                                    
                            </table>
                        </div>
                        
                    
                    </div>




                   

                    


<?php }}} ?>

                  <!------------------------------------------------------------------->

                    <div>
                        <div class="container">

                            <table class="table table-bordered colortable">

                                <thead>
                                    <td class="colortable" height="30" colspan="100" valign="middle" bgcolor="#04ca9a" color="#FFFFFF">
                                    &nbsp;&nbsp;<font color="#FFFFFF">กิจกรรมที่อนุมัติการเข้าร่วมทั้งหมด :
                                            
                                            <?php 
                                                // $countCD="SELECT COUNT(activities_id) AS countCD FROM activities_join  WHERE student_id = '$student_id'"; 
                                                // SELECT COUNT(activities_join.join_id) AS cou FROM activities_join INNER JOIN activities ON activities_join.activities_id = activities.activities_id  WHERE activities_join.student_id= '58342110223-6' AND activities.atttype_id = 6
                                                $countCD="SELECT COUNT(activities.activities_id) AS countCD FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id'";
                                                $resultCD=$con->query($countCD);
                                                while ($row = $resultCD->fetch_assoc()) {
                                                $CD = $row['countCD'];
                                                echo $row['countCD']; }
                                            ?> กิจกรรม จำนวนหน่วยทั้งหมด:
                                            <?php $sum_total = "SELECT SUM(activities_unit) AS Total_t FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE student_id = '$student_id'"; 
                                                $result = $con->query($sum_total);
                                                while ($row = $result->fetch_assoc()) {
                                                echo $row['Total_t'];} 
                                            ?>  หน่วย
                                        </font>
                                            <?php
                                            $textact= "SELECT * FROM text_activities WHERE class_id ='$class_id' AND atttype_id = '$act'";
                                            $res_textact = mysqli_query($con,$textact);
                                            while($row_activities_textact = mysqli_fetch_assoc($res_textact))
                                            {
                                            ?>
                                        <font color="#f60909">
                                            *<?php echo $row_activities_textact['text3'];
                                            }?>
                                        <font>
                                    </td>




                                    <tr>
                                        <?php
                                            $act_type= "SELECT * FROM activities_type ";
                                            $res_act_type = mysqli_query($con,$act_type);
                                            while($row_act_type = mysqli_fetch_assoc($res_act_type))
                                            {
                                                $att_type = $row_act_type['atttype_detail'] ;
                                            
                                        ?>       

                                        <th><?php echo $row_act_type['atttype_detail']; ?></th>
                                        <?php } ?>   
                                    </tr>
                                    
                                </thead>
                                <?php 



                                                    $counttotal="SELECT COUNT(activities_id) AS totalat FROM activities_join WHERE student_id='$student_id' "; 
                                                    $resulttotal=$con->query($counttotal);
                                                    while ($row = $resulttotal->fetch_assoc()) {
                                                    }?> 
                                                   
                                                <?php 
                                        
            
                                                $sum_BC = "SELECT SUM(activities_unit) AS Total FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = atttype_id AND student_id='$student_id'"; 
                                                    $result = $con->query($sum_BC);
                                                    while ($row = $result->fetch_assoc()) {
                                                        $Total =$row['Total'];
                                                        }
                                                ?>
                                                <br>
                                                <?php 
                                                   





                                
                            
                                ?>
                                    <tr>
                                    <?php
                                    
                                        $typee= "SELECT * FROM activities_type ";
                                        $res_type = mysqli_query($con,$typee);
                                        while($row_activities_type = mysqli_fetch_assoc($res_type))
                                        {
                                        $act = $row_activities_type['atttype_id'] ;
                                        ?>
                                        <?php 
                                            
                                             


                                            $countBC="SELECT COUNT(activities.activities_id) AS countBC FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='$student_id' AND atttype_id ='$act'";
                                            $resultBC=$con->query($countBC);
                                            while ($row_count = $resultBC->fetch_assoc()) {
                                                $coutunit = $row_count['countBC'];

 
                                        ?>
                                            
                                        <?php 
                                       $tunit= "SELECT * FROM total_unit WHERE class_id = '$class_id' ";
                                       $res_tunit = mysqli_query($con,$tunit);
                                       while($row_tunit = mysqli_fetch_assoc($res_tunit))
                                       {
                                       $tounit = $row_tunit['t_detail'] ;
                                        }
                                        $calcu= "SELECT * FROM cal WHERE class_id = '$class_id' AND atttype_id = '$act' ";
                                        $res_cal = mysqli_query($con,$calcu);
                                        while($row_cal = mysqli_fetch_assoc($res_cal))
                                        {
                                        $cal = $row_cal['cal_detail'] ;
                                        
                                       

                                         if($Total >= $tounit){
                                             
                                             if($coutunit >= $cal){
                                             
                                        ?>
                                        <td class="ct"><i class="fa fa-check" style="font-size:20px;color:green"></i>  ผ่านกิจกรรม</td>

                                        <?php
                                         
                                                $textend = '<i class="fa fa-check" style="font-size:20px;color:green"><font color="#0f3e0f">ผ่านกิจกรรมตลอดหลักสูตรที่ศึกษา</font>';

                                            
                                                

                                            


                                             }
                                             else{ ?>
                                             <td class="ct"><i class="fa fa-exclamation" style="font-size:20px;color:red"></i>  ยังไม่ผ่านกิจกรรม</td>
                                                 
                                             
                                        <?php
                                                $textend = '<font class="fa fa-exclamation" style="font-size:20px;color:red"><font color="#f60909">   ยังไม่ผ่านกิจกรรมตลอดหลักสูตรที่ศึกษา</font>';
                                            }
                                        } else{
                                            if($coutunit >= $cal){
                                                ?>
                                                    <td class="ct"><i class="fa fa-check" style="font-size:20px;color:green"></i>  ผ่านกิจกรรม</td>
                                                <?php
                                                }else{ ?>
                                                    <td class="ct"><i class="fa fa-exclamation" style="font-size:20px;color:red"></i>  ยังไม่ผ่านกิจกรรม</td>
                                               <?php }
                                        
 
                                            $textend = '<font class="fa fa-exclamation" style="font-size:20px;color:red"><font color="#f60909">   ยังไม่ผ่านกิจกรรมตลอดหลักสูตรที่ศึกษา</font>';
                                        } 

                                        }
                                        }
                                        }
                                        ?>
                                        
                                    </tr>
                                    
                                    

                            
                                
                                
                                <td class="colortable" height="30" colspan="100" valign="middle" bgcolor="#04ca9a">&nbsp;&nbsp;
                                           
                                </td>
                                    
                            </table>
                        </div>
                        
                    
                    </div>
        </body>
        

    </html>









                






<?php
    include_once('footer.php'); 
?>

                          