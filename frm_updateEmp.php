<?php include_once('nav.php');?>
<?php 
    require 'connection.php';
    $emp_id = $_GET['id'];
    $sql = "SELECT * FROM employee WHERE emp_id='$emp_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_employee = mysqli_query($con,$sql);
    $row_employee = mysqli_fetch_assoc($res_employee);

    if (!$_SESSION["emp_id"]){  //check session
        Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
    }else { 
    //     if(isset($_SESSION['is_user'])){
    //       echo "<script>";
    //       echo "window.history.back()";
    //       echo "</script>"; 
    //   }else{
    
?>
<!doctype html>
<html>
        
        <script language="javaScript">
            function checkemail(str){
                var emailFilter=/^.+@.+\..{2,3}$/;
                var str=document.form.text1.value;
            if (!(emailFilter.test(str))) { 
                alert ("ท่านใส่อีเมล์ไม่ถูกต้อง");
                return false;
            }
                return true;
            }
        </script>
        <script language="JavaScript" type="text/javascript">
        function check() {
            if(document.checkForm.post_detail.value.length < 5) {
            alert("กรุณาระบุข้อความประกาศอย่างน้อย 5 ตัวอักษร");
            document.checkForm.post_detail.focus() ;
            return false;
            }
            else if(document.checkForm.post_detail.value.length > 100) {
            alert("กรุณาระบุข้อความประกาศไม่เกิน 100 ตัวอักษร");
            document.checkForm.post_detail.focus() ;
            return false;
            }
            else 
            return true ;  
            }
        </script>

    <body>
        <form name="frmlogin" method="post" action="updateEmployee.php">
            <div class="form-element-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-element-list">
                                <div class="cmp-tb-hd bcs-hd">
                                    <h2>แก้ไขข้อมูล</h2>
                                    <p>แก้ไขข้อมูลเจ้าหน้าที่และสโมสรนักศึกษา</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-support"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="hidden" name="id" 
                                                value="<?php echo $row_employee['emp_id'];?>"> 
                                                <input type="text" class="form-control" name="username" 
                                                value="<?php echo $row_employee['emp_username'];?>"
                                                required 
                                                pattern="[A-Za-z0-9]{1,}" title="กรอกตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น"
                                                placeholder="ไอดี(Username)">                                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-support"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="password" class="form-control" name="password"
                                                value="<?php echo $row_employee['emp_password'];?>" 
                                                required
                                                pattern="[A-Za-z0-9]{1,}" title="กรอกตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น"
                                                placeholder="รหัสผ่าน(Password)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-support"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control" name="name"
                                                value="<?php echo $row_employee['emp_name'];?>" 
                                                required placeholder="ชื่อ"
                                                pattern="^[a-zA-Zก-๏\s]+$" title="กรอกตัวอักษรภาษาอังกฤษและภาษาไทยเท่านั้น">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-support"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control" name="lastname"
                                                value="<?php echo $row_employee['emp_lastname'];?>"
                                                pattern="^[a-zA-Zก-๏\s]+$" title="กรอกตัวอักษรภาษาอังกฤษและภาษาไทยเท่านั้น" required
                                                placeholder="นามสกุล">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-phone"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control" name="phone"
                                                value="<?php echo $row_employee['emp_phone'];?>" 
                                                pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น"
                                                required placeholder="เบอร์โทรศัพท์">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-mail"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="email" class="form-control" name="email"
                                                value="<?php echo $row_employee['emp_email'];?>" 
                                                required placeholder="อีเมล์"onSubmit="return checkemail()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="fm-checkbox">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php if(isset($_SESSION['is_employee']) or isset($_SESSION['is_user']))
                                            { ?>
                                  
                                            <?php } else { ?>
                                                                                                        
                                                <?php 
                                                    if($row_employee['emp_status']== 'ADMIN'){
                                                        echo'<label><input type="radio" name="emp_status" checked class="i-checks"value="ADMIN"> <i></i> แอดมิน</label>';
                                                        echo'&nbsp;&nbsp;&nbsp;';
                                                        echo'<label><input type="radio" name="emp_status" class="i-checks"value="EMPLOYEE"> <i></i> เจ้าหน้าที่</label>';
                                                        echo'&nbsp;&nbsp;&nbsp;';
                                                        echo'<label><input type="radio" name="emp_status" class="i-checks"value="USER"> <i></i> สโมสรนักศึกษา</label>';

                                                    }
                                                    else{

                                                        if($row_employee['emp_status']== 'EMPLOYEE')
                                                        {
                                                            echo'<label><input type="radio" name="emp_status" checked class="i-checks"value="EMPLOYEE"> <i></i> เจ้าหน้าที่</label>';
                                                            echo'&nbsp;&nbsp;&nbsp;';
                                                            echo'<label><input type="radio" name="emp_status" class="i-checks"value="USER"> <i></i> สโมสรนักศึกษา</label>';
                                                                                                                
                                                        }
                                                        else{
                                                            echo'<label><input type="radio" name="emp_status" checked class="i-checks"value="EMPLOYEE"> <i></i> เจ้าหน้าที่</label>';
                                                            echo'&nbsp;&nbsp;&nbsp;';
                                                            echo'<label><input type="radio" name="emp_status" checked class="i-checks"value="USER"> <i></i> สโมสรนักศึกษา</label>';
                                                                                                                            

                                                            }
                                                     }
                                                
                                                ?>
                                            <?php  } ?>            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3 "style="float: right;">
                                        <div class="breadcomb-report">
                                            <button type="submit" class="btn">ยืนยัน</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </body>
<br><br><br><br><br>

    <?php 
        include_once('footer.php');
    ?>



</html>

<?php }?>