<?php 
    include_once('nav.php');
    include_once('js_and_css.php');
    
    ?>
<?php 
if (!$_SESSION["emp_id"]){  //check session
	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else { if(isset($_SESSION['is_user']) ){ 
  echo "<script>"; 
      echo "window.history.back()";
  echo "</script>"; 
  ?>
  <?php } else { ?> 
  
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการข้อมูลเจ้าหน้าที่</title>

    
   
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
                                        <i class="fa fa-user-secret" style="font-size:24px"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>จัดการข้อมูลเจ้าหน้าที่</h2>
                                        <p>เจ้าหน้าที่<span class="bread-ntd">และสโมสรนักศึกษา</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <a href="form_employee.php"><button data-toggle="tooltip" data-placement="left"
                                            class="btn"><i class="fa fa-plus" style="font-size:14px;"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>รายชื่อเจ้าหน้าที่และสโมสรนักศึกษา</h2>
                            <p></p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>รหัส</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>อีเมล์</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                      $link = @mysqli_connect("localhost","root","1234","projectrmuti")or die(mysqli_conenct_error()."</body></htmi>");
                                      mysqli_query($link,"SET NAMES UTF8"); 
                                      $sql = "SELECT * FROM employee WHERE emp_status = 'USER' OR emp_status = 'EMPLOYEE' ORDER BY emp_id DESC" ;
                                      $result = mysqli_query($link, $sql);
                                      ?>
                                        <tr>


                                          <?php while ($rs=mysqli_fetch_array($result)){ ?>
                                            <td><?php echo $rs['emp_id'] ?></td>
                                            <td><?php echo $rs['emp_name'] ?></td>
                                            <td><?php echo $rs['emp_lastname'] ?></td>
                                            <td><?php echo $rs['emp_status'] ?></td>
                                            <td><?php echo $rs['emp_email'] ?></td>
                                            <td><?php echo $rs['emp_phone'] ?></td>
                                            <td><a href="frm_updateEmp.php?id=<?= $rs['emp_id']; ?>"><i
                                                      class="fa fa-pencil" style="font-size:26px;color:green"></i></i></td>
                                            <td><a href="delete_employee.php?id=<?= $rs['emp_id']; ?>"
                                                  onclick="return confirm('คุณต้องการลบเจ้าหน้าที่คนนี้หรือไม่')"><i
                                                      class="fa fa-user-times" style="font-size:26px;color:red"></i></td>
                                        </tr>
                                      <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <!-- <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>อีเมล์</th>
                                        <th>เบอร์โทรศัพท์</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>

<?php 
    include_once('footer.php');
?>

</html>
  <?php }?>
<?php }?>