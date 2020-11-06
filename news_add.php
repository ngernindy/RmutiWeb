<?php include_once('nav.php');
    include 'connection.php';
    
?>
<html>

<head>
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="//cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-latest.js"></script> -->
    <title>เพิ่มข่าวสาร</title>
</head>

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>



<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="breadcomb-wp">
                            <div class="form-example-area">
                                <div class="container">
                                    <div class="row">
                                        <form id="form1" runat="server" action="insert_news.php" method="post" enctype="multipart/form-data">
                                            <div class="form-example-wrap mg-t-30">
                                                <div class="cmp-tb-hd cmp-int-hd">
                                                    <h2>เพิ่มข่าวกิจกรรม</h2>
                                                </div>
                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">เลือกประเภทข่าว</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <select name="newstype">
                                                                        <?php
                                                                                        $sql_newstype = "SELECT * FROM newstype";//$sqlnews_type คือตั้งชื่อ
                                                                                        $res_newstype = mysqli_query($con,$sql_newstype);
                                                                                        while ($row_newstype = mysqli_fetch_assoc($res_newstype)){
                                                                                            echo '<option value="'.$row_newstype['newstype_id'].'">'.$row_newstype['newstype_detail'].'</option>';
                                                                                            }
                                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">หัวข้อข่าว</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <input type="text" name="news_topic"
                                                                        class="form-control input-sm"
                                                                        placeholder="กรุณาใส่หัวข้อข่าว">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-example-int form-horizental mg-t-15">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">รายละเอียด</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                <div>
                                                                    <textarea name="news_detail" id="news_detail"
                                                                        class="form-control ckeditor"></textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-example-int form-horizental mg-t-15">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="hrzn-fm"></label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-4 col-6">
                                                            <img id="blah" class="img-fluid img-thumbnail" alt="your image" />
                                                        </div>                                    
                                                    </div>
                                                </div>
                                                <div class="form-example-int form-horizental mg-t-15">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="hrzn-fm">อัพโหลดไฟล์</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                            <input type="file" name="news_filename"onchange="readURL(this);" required>
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-example-int form-horizental mg-t-15">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="hrzn-fm">ปีการศึกษา</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                            <div class="fm-checkbox">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-example-int mg-t-15">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                            <input type="submit"
                                                                class="btn btn-success notika-btn-success"
                                                                value="บันทึก">
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
<?php 
    include_once('footer.php');
?>

</html>
<script>
CKEDITOR.replace( 'news_detail'
 
 );
</script>