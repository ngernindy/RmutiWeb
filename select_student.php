<?php
    include_once('nav.php');
    include 'connection.php';

    $year = $_GET['yearselect'];
    $group = $_GET['groupselect'];
    $subject = $_GET['subjectselect'];
   
     $sql = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE student_subject.subject_id = '$subject' AND student_group.group_id='$group'AND year_id = '$year' ORDER BY student_id DESC";//ORDER BY คือการเรียงตามลำดับ ID
                                        
     if (!$_SESSION["emp_id"]){  //check session
        Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
      }else { if(isset($_SESSION['is_user'])){
          echo "<script>";
          echo "window.history.back()";
          echo "</script>"; 
      }else{
                                                
   

   ?>
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
                                        <i class="fa fa-users" style="font-size:24px"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>รายชื่อนักศึกษา</h2>
                                        <?php
                                            $res_student = mysqli_query($con,$sql);
                                            $row_student = mysqli_fetch_assoc($res_student)
                                        ?>
                                            <p>สาขาวิชา:<span class="bread-ntd">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_student['subject_name']; ?></span></p>
                                            <p>กลุ่มเรียน:<span class="bread-ntd">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_student['group_detaill']; ?></span></p>
                                            <p>ปีการศึกษา:<span class="bread-ntd">&nbsp;<?php echo $row_student['year_id']; ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-report">
                                <form action="pdf/student_group.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden"  name="yearselect" value="<?php echo $year?>">
                                    <input type="hidden"  name="groupselect" value="<?php echo $group?>">
                                    <input type="hidden"  name="subjectselect" value="<?php echo $subject?>">
                                    <button type="submit" data-toggle="tooltip" data-placement="left"title="พิมพ์" class="btn" ><i class="fa fa-print" style="font-size:24px;"></i></button></a>
                                </form>                      
                                </div>            
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <p></p>
                        </div>
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
                                    <?php 
                                        $sql = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE student_subject.subject_id = '$subject' AND student_group.group_id='$group'AND year_id = '$year' ORDER BY student_id DESC";//ORDER BY คือการเรียงตามลำดับ ID
                                        // $sql = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE group_id='13' ORDER BY student_username DESC";//ORDER BY คือการเรียงตามลำดับ ID
                                        //INNER JOIN student_subject ON students.subject_id=student_subject.subject_id  ORDER BY student_username
                                        $res_student = mysqli_query($con,$sql);
                                            while($row_student = mysqli_fetch_assoc($res_student)){
                                                
                                        ?>
                                    <tr>
                                        <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                style="text-decoration: none"><?php echo $row_student['student_id']; ?>
                                        </td>
                                        <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                style="text-decoration: none"><?php echo $row_student['student_name']; ?>
                                        </td>
                                        <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                style="text-decoration: none"><?php echo $row_student['student_lastname']; ?>
                                        </td>
                                        <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                style="text-decoration: none"><?php echo $row_student['year_id']; ?></td>
                                        <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                style="text-decoration: none">
                                                <?php 
                                                if($row_student['class_id']==1){
                                                    echo 'หลักสูตรปกติ';

                                                }else{
                                                    echo 'หลักสูตรเทียบโอน';

                                                } ?></td>

                                        <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                style="text-decoration: none"><?php echo $row_student['subject_name']; ?>
                                        </td>
                                        <td><a href="activities_show.php?id=<?= $row_student['student_id']; ?>"
                                                style="text-decoration: none"><?php echo $row_student['group_detaill']; ?>
                                        </td>
                                        <td><a href="student_show.php?id=<?= $row_student['student_id']; ?>"><i
                                                    class="fa fa-search" style="font-size:26px;color:#00cc99"></i></button>
                                        </td>
                                        <td><a href="frm_update_student.php?id=<?= $row_student['student_id']; ?>"><i
                                                    class="fa fa-pencil" style="font-size:26px;color:green"></i></i></td>
                                        <td><a href="delete_student.php?id=<?= $row_student['student_id']; ?>"
                                                onclick="return confirm('คุณต้องการลบนักศึกษาคนนี้หรือไม่')"><i
                                                    class="fa fa-user-times" style="font-size:26px;color:red"></i></td>

                                    </tr>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <!-- <tr>
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
                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php 
        include_once('footer.php');
    ?>

</html>
<?php }?>
<?php }?>