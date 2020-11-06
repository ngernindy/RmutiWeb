<?php 
    include_once('nav.php');
    include 'connection.php';


    if (!$_SESSION["emp_id"]){  //check session
        Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
      }else { if(isset($_SESSION['is_user'])){
          echo "<script>";
          echo "window.history.back()";
          echo "</script>"; 
      }else{

    ?>

<?php 
if (!$_SESSION["emp_id"]){  //check session
	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการข้อมูลนักศึกษา</title>

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
    <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="css/summernote/summernote.css">
    <!-- Range Slider CSS
		============================================ -->
    <link rel="stylesheet" href="css/themesaller-forms.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- bootstrap select CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="css/datapicker/datepicker3.css">
    <!-- Color Picker CSS
		============================================ -->
    <link rel="stylesheet" href="css/color-picker/farbtastic.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/chosen/chosen.css">
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="css/notification/notification.css">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
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

<body>


    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="tabs-info-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="widget-tabs-int">
                                        <div class="tab-hd">
                                            <h2>เพิ่มข้อมูลนักศึกษา</h2>
                                        </div>
                                        <div class="widget-tabs-list">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab"
                                                        href="#home">นำเข้าไฟล์รายชื่อนักศึกษา</a></li>
                                                <li><a data-toggle="tab" href="#menu1">เพิ่มรายชื่อนักศึกษา</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content tab-custom-st">
                                                <div id="home" class="tab-pane fade in active">
                                                   
                                                    <!DOCTYPE html>
                                                    <html>

                                                    <head>
                                                        <script src="jquery-3.2.1.min.js"></script>
                                                        <meta charset="utf-8">

                                                        <style>
                                                        .outer-scontainer {
                                                            background: #F0F0F0;
                                                            border: #e0dfdf 1px solid;
                                                            padding: 20px;
                                                            border-radius: 2px;
                                                        }

                                                        .input-row {
                                                            margin-top: 0px;
                                                            margin-bottom: 20px;
                                                            text-align: center;
                                                        }

                                                        .nnn {
                                                            
                                                            
                                                            

                                                        }

                                                        .outer-scontainer table {
                                                            border-collapse: collapse;
                                                            width: 100%;
                                                        }

                                                        .outer-scontainer th {
                                                            border: 1px solid #dddddd;
                                                            padding: 8px;
                                                            text-align: left;
                                                        }

                                                        .outer-scontainer td {
                                                            border: 1px solid #dddddd;
                                                            padding: 8px;
                                                            text-align: left;
                                                        }

                                                        #response {
                                                            padding: 10px;
                                                            margin-bottom: 10px;
                                                            border-radius: 2px;
                                                            display: none;
                                                        }

                                                        .success {
                                                            background: #c7efd9;
                                                            border: #bbe2cd 1px solid;
                                                        }

                                                        .error {
                                                            background: #fbcfcf;
                                                            border: #f3c6c7 1px solid;
                                                        }

                                                        div#response.display-block {
                                                            display: block;
                                                        }
                                                        
                                                        


                                                        



                                                        



                                                        </style>
                                                        <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            $("#frmCSVImport").on("submit", function() {

                                                                $("#response").attr("class", "");
                                                                $("#response").html("");
                                                                var fileType = ".csv";
                                                                var regex = new RegExp(
                                                                    "([a-zA-Z0-9ก-ฮ\s_\\.\-:])+(" +
                                                                    fileType + ")$");
                                                                if (!regex.test($("#file").val()
                                                                        .toLowerCase())) {
                                                                    $("#response").addClass("error");
                                                                    $("#response").addClass(
                                                                        "display-block");
                                                                    $("#response").html(
                                                                        "กรุณาเลือกไฟล์ : <b>" +
                                                                        fileType + "</b> ");
                                                                    return false;
                                                                }
                                                                return true;
                                                            });
                                                        });
                                                        </script>
                                                    </head>

                                                    <body>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        

                                                        
                                                        <div class="">
                                                            <div class="row">

                                                                <form action="insert_file.php" method="post"name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">

                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <div class="chosen-select-act fm-cmp-mg ">
                                                                                <select class="chosen" name="subjectselect" required >
                                                                                    <option value="" disabled selected>โปรดเลือกสาขาวิชา</option>
                                                                                    <?php 
                                                                                    $sql_subject = "SELECT * FROM student_subject";
                                                                                    $res_subject = mysqli_query($con,$sql_subject);
                                                                                    while ($row_subject = mysqli_fetch_assoc($res_subject)){
                                                                                        echo '<option value="'.$row_subject['subject_id'].'">'.$row_subject['subject_name'].'</option>';
                                                                                    
                                                                                        
                                                                                    }
                                                                                    

                                                                                ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <div class="chosen-select-act fm-cmp-mg ">
                                                                                <select class="chosen" name="groupselect" required >
                                                                                    <option value="" disabled selected>โปรดเลือกกลุ่มเรียน</option>
                                                                                    <?php 
                                                                                    $sql_group = "SELECT * FROM student_group";
                                                                                    $res_sql_group = mysqli_query($con,$sql_group);
                                                                                    while ($row_group = mysqli_fetch_assoc($res_sql_group)){
                                                                                        echo '<option value="'.$row_group['group_id'].'">'.$row_group['group_detaill'].'</option>';
                                                                                    
                                                                                        
                                                                                    }
                                                                                    

                                                                                ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <div class="chosen-select-act fm-cmp-mg ">
                                                                                <select class="chosen" name="yearselect" required >
                                                                                    <option value="" disabled selected>โปรดเลือกปีการศึกษา</option>
                                                                                    <?php 
                                                                                    $sql_student_year = "SELECT * FROM student_year";
                                                                                    $res_student_year = mysqli_query($con,$sql_student_year);
                                                                                    while ($row_student_year = mysqli_fetch_assoc($res_student_year)){
                                                                                        echo '<option value="'.$row_student_year['year_id'].'">'.$row_student_year['year_id'].'</option>';
                                                                                    
                                                                                        
                                                                                    }
                                                                                    

                                                                                ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <div class="chosen-select-act fm-cmp-mg ">  
                                                                                <select class="chosen" name="classselect" required >
                                                                                    <option value="" disabled selected>โปรดเลือกโปรแกรมวิชา</option>
                                                                                    <?php 
                                                                                    $sql_class = "SELECT * FROM students_class";
                                                                                    $res_class = mysqli_query($con,$sql_class);
                                                                                    while ($row_class = mysqli_fetch_assoc($res_class)){
                                                                                        echo '<option value="'.$row_class['class_id'].'">'.$row_class['class_student'].'</option>';
                                                                                    
                                                                                        
                                                                                    }
                                                                                    

                                                                                ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                        


                                                                        <br><br><br>
                                                            </div>
                                                                    



                                                                    <div class="input-row">
                                                                    
                                                                        <label class="col-md-2 control-label">โปรดเลือกไฟล์ CSV</label>
                                                                        <input type="file" name="file" id="file"accept=".csv" class="col-md-3 ">
                                                                            
                                                                            
                                                                        <button type="submit" id="submit"name="import" class="btn btn-success notika-btn-success">นำเข้า</button>
                                                                       
                                                                    </div>
                                                                    
                                                                </form>

                                                            </div>
                                                           

                                                        </div>
                                                </div>
                                                <div id="menu1" class="tab-pane fade">
                                                            <div class="tab-ctn">
                                                                <form name="frmlogin" method="post"
                                                                    action="save-student.php">

                                                                    <div class="row">
                                                                        <div
                                                                            class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-element-list">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <i
                                                                                                    class="notika-icon notika-support"></i>
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="student_id"
                                                                                                    required
                                                                                                    placeholder="รหัสนักศึกษา">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <i
                                                                                                    class="notika-icon notika-support"></i>
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                <input type="password"
                                                                                                    class="form-control"
                                                                                                    name="student_password"
                                                                                                    required
                                                                                                    pattern="[A-Za-z0-9]{1,}"
                                                                                                    title="กรอกตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น"
                                                                                                    placeholder="รหัสผ่าน(Password)">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <i
                                                                                                    class="notika-icon notika-support"></i>
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="student_name"
                                                                                                    required
                                                                                                    placeholder="ชื่อ"
                                                                                                    pattern="^[a-zA-Zก-๏\s]+$"
                                                                                                    title="กรอกตัวอักษรภาษาอังกฤษและภาษาไทยเท่านั้น">

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <i
                                                                                                    class="notika-icon notika-support"></i>
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="student_lastname"
                                                                                                    pattern="^[a-zA-Zก-๏\s]+$"
                                                                                                    title="กรอกตัวอักษรภาษาอังกฤษและภาษาไทยเท่านั้น"
                                                                                                    required
                                                                                                    placeholder="นามสกุล">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <i
                                                                                                    class="notika-icon notika-phone"></i>
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="student_telephone"
                                                                                                    pattern="[0-9]{1,}"
                                                                                                    title="กรอกตัวเลขเท่านั้น"
                                                                                                    required
                                                                                                    placeholder="เบอร์โทรศัพท์">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <i
                                                                                                    class="notika-icon notika-mail"></i>
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="student_email"
                                                                                                    required
                                                                                                    placeholder="อีเมล์"
                                                                                                    onSubmit="return checkemail()">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <i
                                                                                                    class="notika-icon notika-mail"></i>
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="student_address"
                                                                                                    required
                                                                                                    placeholder="ที่อยู่"
                                                                                                    onSubmit="return checkemail()">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                               
                                                                                            </div>
                                                                                            <div class="nk-int-st">
                                                                                                
                                                                                            
                                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                    <div class="fm-checkbox">
                                                                                                        <label><input type="radio" name="student_gender" checked class="i-checks"value="ชาย"> <i></i> ชาย</label>
                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                        <label><input type="radio" name="student_gender" class="i-checks"value="หญิง"> <i></i> หญิง</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                                                                        <div
                                                                                            class="form-group ic-cmp-int">
                                                                                            <div class="form-ic-cmp">
                                                                                                <!-- <i
                                                                                                    class="notika-icon notika-mail"></i> -->
                                                                                            </div>
                                                                                            <!-- <div class="nk-int-st">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="student_address"
                                                                                                    required
                                                                                                    placeholder="ที่อยู่2"
                                                                                                    onSubmit="return checkemail()">
                                                                                            </div> -->
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                                        <div
                                                                                            class="chosen-select-act fm-cmp-mg">

                                                                                            <select class="chosen" name="group_id">
                                                                                                <option value=""
                                                                                                    disabled selected>
                                                                                                    กลุ่มเรียน
                                                                                                </option>
                                                                                                <?php 
                                                                                                        $sql_students_group = "SELECT * FROM student_group";
                                                                                                        $res_students_group = mysqli_query($con,$sql_students_group);
                                                                                                        while ($row_students_group = mysqli_fetch_assoc($res_students_group)){
                                                                                                            echo '<option value="'.$row_students_group['group_id'].'">'.$row_students_group['group_detaill'].'</option>';
                                                                                                            
                                                                                                        }

                                                                                                    ?>

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                                        <div
                                                                                            class="chosen-select-act fm-cmp-mg ">
                                                                                            <select class="chosen"
                                                                                                name="subject_id">
                                                                                                <option value=""
                                                                                                    disabled selected>
                                                                                                    สาขาวิชา</option>
                                                                                                <?php 
                                                                                            $sql_students_subject = "SELECT * FROM student_subject";
                                                                                            $res_students_subject = mysqli_query($con,$sql_students_subject);
                                                                                            while ($row_students_subject = mysqli_fetch_assoc($res_students_subject)){
                                                                                                echo '<option value="'.$row_students_subject['subject_id'].'">'.$row_students_subject['subject_name'].'</option>';
                                                                                                
                                                                                            }

                                                                                        ?>



                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                                        <div
                                                                                            class="chosen-select-act fm-cmp-mg">
                                                                                            <select class="chosen" name="year_id">
                                                                                                <option value=""
                                                                                                    disabled selected>
                                                                                                    ปีการศึกษา
                                                                                                </option>
                                                                                                <?php 
                                                                                            $sql_student_year = "SELECT * FROM student_year";
                                                                                            $res_student_year = mysqli_query($con,$sql_student_year);
                                                                                            while ($row_student_year = mysqli_fetch_assoc($res_student_year)){
                                                                                                echo '<option value="'.$row_student_year['year_id'].'">'.$row_student_year['year_id'].'</option>';
                                                                                                
                                                                                            }

                                                                                        ?>

                                                                                            </select>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <br>

                                                                                        <div
                                                                                            class="chosen-select-act fm-cmp-mg">
                                                                                            <select class="chosen" name="class_id">
                                                                                                <option value=""
                                                                                                    disabled selected>
                                                                                                    โปรแกรมวิชา
                                                                                                </option>
                                                                                            <?php 
                                                                                                $sql_student_class = "SELECT * FROM students_class";
                                                                                                $res_student_class = mysqli_query($con,$sql_student_class);
                                                                                                while ($row_student_class = mysqli_fetch_assoc($res_student_class)){
                                                                                                    echo '<option value="'.$row_student_class['class_id'].'">'.$row_student_class['class_student'].'</option>';
                                                                                                    
                                                                                                }

                                                                                            ?>

                                                                                            </select>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                    

                                                                                    
                                                                                    <input type="hidden" name="student_img" value="student.jpg">
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3 "
                                                                                        style="float: right;">
                                                                                        <div class="breadcomb-report">
                                                                                            <button type="submit"
                                                                                                class="btn">ยืนยัน</button>
                                                                                            <button type="reset"
                                                                                                class="btn btn-danger notika-btn-danger">ยกเลิก</button>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                </div>
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <BR><br><br><br>

</body>
<?php 
    include_once('footer.php');
    ?>

</html>
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
<!-- Input Mask JS
      ============================================ -->
<script src="js/jasny-bootstrap.min.js"></script>
<!-- icheck JS
      ============================================ -->
<script src="js/icheck/icheck.min.js"></script>
<script src="js/icheck/icheck-active.js"></script>
<!-- rangle-slider JS
      ============================================ -->
<script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
<script src="js/rangle-slider/rangle-active.js"></script>
<!-- datapicker JS
      ============================================ -->
<script src="js/datapicker/bootstrap-datepicker.js"></script>
<script src="js/datapicker/datepicker-active.js"></script>
<!-- bootstrap select JS
      ============================================ -->
<script src="js/bootstrap-select/bootstrap-select.js"></script>
<!--  color-picker JS
      ============================================ -->
<script src="js/color-picker/farbtastic.min.js"></script>
<script src="js/color-picker/color-picker.js"></script>
<!--  notification JS
      ============================================ -->
<script src="js/notification/bootstrap-growl.min.js"></script>
<script src="js/notification/notification-active.js"></script>
<!--  summernote JS
      ============================================ -->
<script src="js/summernote/summernote-updated.min.js"></script>
<script src="js/summernote/summernote-active.js"></script>
<!-- dropzone JS
      ============================================ -->
<script src="js/dropzone/dropzone.js"></script>
<!--  wave JS
      ============================================ -->
<script src="js/wave/waves.min.js"></script>
<script src="js/wave/wave-active.js"></script>
<!--  chosen JS
      ============================================ -->
<script src="js/chosen/chosen.jquery.js"></script>
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

<script src="js/data-table/jquery.dataTables.min.js"></script>
<script src="js/data-table/data-table-act.js"></script>



<?php }?>
<?php }?>
<?php }?>