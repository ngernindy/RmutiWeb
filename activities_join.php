<?php 
    include_once('nav.php');
    include_once('js_and_css.php');
    require 'connection.php';
    $activities_id = $_GET['id'];


    $sql = "SELECT * FROM activities_join INNER JOIN students ON activities_join.student_id=students.student_id INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id  WHERE activities_id='$activities_id' ";//ORDER BY คือการเรียงตามลำดับ ID
    $res_activities_join = mysqli_query($con,$sql);
    //////////////////////////////////////////////////////
    $act = "SELECT * FROM activities INNER JOIN activities_type ON activities.atttype_id=activities.atttype_id WHERE activities_id='$activities_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_act = mysqli_query($con,$act);
    $row_act = mysqli_fetch_assoc($res_act);

    $qrcode = "SELECT * FROM qrcodes WHERE activities_id='$activities_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_qrcode = mysqli_query($con,$qrcode);
    $row_qrcode = mysqli_fetch_assoc($res_qrcode);
    /////////////////////////////////////////////

    $countStudent="SELECT COUNT(student_id) AS countStudent FROM activities_join WHERE activities_id='$activities_id'";
    $resultcount=$con->query($countStudent);
    while ($row_cstudent = $resultcount->fetch_assoc()) {
    $Cstudent = $row_cstudent['countStudent'];
    }

?>


<?php 
if (!$_SESSION["emp_id"]){  //check session
	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else { ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </style>

    <title>ผู้เข้าร่วมกิจกรรม</title>



</head>

<body>



    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                    
                        <div class="basic-tb-hd" style="text-align:center;">
                            <h2><?php echo $row_act['activities_topic']; ?></h2>
                            <p>เทอม <?php echo $row_act['term_id']; ?></p>
                            <p>ปีการศึกษา <?php echo $row_act['activities_year']; ?></p>
                            <p>ด้าน <?php echo $row_act['atttype_detail']; ?></p>
                            <p>วันที่จัด <?php echo $row_act['activities_date']; ?></p>
                            <p>วันที่สิ้นสุด <?php echo $row_act['time_out']; ?></p>
                            <p>หน่วยกิต <?php echo $row_act['activities_unit']; ?></p>
                            <br>
                            <button style="font-size:24px" onclick="openForm()"
                                class="btn btn-success notika-btn-success"> <i class="fa fa-user-plus"></i></button>
                            <div class="form-popup" id="myForm">
                                <form method="post" action="action_join.php" class="form-container">
                                    <label for="text"><b>เพิ่มผู้เข้าร่วม</b></label>
                                    <input type="text" placeholder="โปรดใส่รหัสนักศึกษา" name="student_id" required>
                                    <input type="hidden" name="activities_id"
                                        value="<?php echo $row_act['activities_id']; ?>">
                                    <input type="hidden" name="activities_unit"
                                        value="<?php echo $row_act['activities_unit']; ?>">

                                    <div style="">
                                        <button type="submit" class="btn btn-success notika-btn-success"
                                            onclick="ckUser();">ยืนยัน</button>
                                        <button type="button" class="btn btn-danger notika-btn-danger"
                                            onclick="closeForm()">ยกเลิก</button>
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
                            <?php { ?>
                            <br><br>
                            <?php { if(isset($row_qrcode['qrImg'])){}else{ ?>
                            <form action="QR-Scanner-Generator-master/index.php" method="get">
                                <input type="hidden" name="id_att" value="<?php echo $row_act['activities_id']; ?>">
                                <button type="submit" class="btn btn-success notika-btn-success"><i class="fa fa-qrcode"
                                        style="font-size:34px"></i></button>
                                <?php } ?>
                                <?php } ?>

                            </form>
                            <?php } ?>
                            <br>
                            <?php { if(isset($row_qrcode['qrImg'])){?>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>

                            <a href="delete_qrcode.php?id=<?= $row_qrcode['qrcode_id']; ?>"
                                onclick="return confirm('คุณต้องการลบ QRCode นี้หรือไม่')"><i
                                    class="fa fa-times-circle-o" style="font-size:24px;color:red"></i></a>
                            <br>
                            <img src="QR-Scanner-Generator-master/userQr/<?php echo $row_qrcode['qrImg']?>"
                                class="img-fluid img-thumbnail" alt="" width="18%" height="18%">
                            <br>

                            <?php }else{} ?>
                            <?php } ?>

                            <br>

                            <?php 

                            if($row_act['act_status']==1){
                            
                            ?>

                                <form action="End_join.php" method="post">
                                    <input type="hidden" name="id_att" value="<?php echo $row_act['activities_id']; ?>">
                                    <input type="hidden" name="act_status" value="0">
                                    <button type="submit" class="btn btn-danger notika-btn-danger" style="font-size:18px"><i class="fa fa-calendar-times-o"></i> สิ้นสุดกิจกรรม</button>
                            
                                </form>
                            <?php } else {?>
                                <form action="End_join.php" method="post">
                                    <input type="hidden" name="id_att" value="<?php echo $row_act['activities_id']; ?>">
                                    <input type="hidden" name="act_status" value="1">
                                    <button type="submit" class="btn btn-success notika-btn-success" style="font-size:18px"><i class="fa fa-calendar-plus-o"></i> เริ่มกิจกรรม</button>
                                </form>
                            
                            
                            <?php }?>




                            <!-- <a href="End_join.php?id=<?= $row_activities_join['join_id']; ?>"onclick="return confirm('คุณต้องการจบกิจกรรมนี้หรือไม่')"><button class ="btn btn-success notika-btn-success" style="font-size:18px" ><i class="fa fa-calendar-check-o" ></i> เริ่มกิจกรรม</button></a> -->







                        </div>


                        

                       

                        จำนวนนักศึกษาที่เข้าร่วม : <?php echo $Cstudent;?> คน
                        
                        
                        

                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-hover table-inbox">
                                <tr>
                                    <td>รหัสนักศึกษา</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>สาขาวิชา</td>
                                    <td>กลุ่มเรียน</td>
                                    <td>ปีการศึกษา</td>
                                    <td>รูป</td>
                                    <td>ลบ</td>
                                </tr>
                                <?php 
                                        while($row_activities_join = mysqli_fetch_assoc($res_activities_join)){
                                            
                                    ?>
                                <tr>
                                    <td><a href="student_show.php?id=<?= $row_activities_join['student_id']; ?>"
                                            style="text-decoration: none"><?php echo $row_activities_join['student_id']; ?>
                                    </td>
                                    <td><a href="student_show.php?id=<?= $row_activities_join['student_id']; ?>"
                                            style="text-decoration: none"><?php echo $row_activities_join['student_name']; ?>
                                    </td>
                                    <td><a href="student_show.php?id=<?= $row_activities_join['student_id']; ?>"
                                            style="text-decoration: none"><?php echo $row_activities_join['student_lastname']; ?>
                                    </td>
                                    <td><a href="student_show.php?id=<?= $row_activities_join['student_id']; ?>"
                                            style="text-decoration: none"><?php echo $row_activities_join['subject_name']; ?>
                                    </td>
                                    <td><a href="student_show.php?id=<?= $row_activities_join['student_id']; ?>"
                                            style="text-decoration: none"><?php echo $row_activities_join['group_detaill']; ?>
                                    </td>
                                    <td><a href="student_show.php?id=<?= $row_activities_join['student_id']; ?>"
                                            style="text-decoration: none"><?php echo $row_activities_join['year_id']; ?>
                                    </td>
                                    <?php if($row_activities_join['img_one']!="" && $row_activities_join['img_two']!="") {?>
                                    <td><a href="img_show.php?id=<?= $row_activities_join['join_id']; ?>"
                                            style="text-decoration: none"><i class="fa fa-picture-o" style="font-size:24px;color:green"></i>
                                    </td>
                                    <?php } else{ ?>
                                    <td><i class="fa fa-picture-o" style="font-size:24px;color:red"></i></td>
                                    <?php } ?>

                                    
                                    <td><a href="delete_join.php?id=<?= $row_activities_join['join_id']; ?>"
                                            onclick="return confirm('คุณต้องการลบรายชื่อนี้หรือไม่')"><i
                                                class="fa fa-user-times" style="font-size:24px;color:red"></i></td>

                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>





<br><br><br><br>
<?php 
    include_once('footer.php');
?>

</html>
<?php }?>