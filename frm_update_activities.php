<?php include_once('nav.php');
    include 'connection.php';
    $activities_id = $_GET['id'];

    $sql = "SELECT * FROM activities WHERE activities_id='$activities_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_activities = mysqli_query($con,$sql);
    $row_activities = mysqli_fetch_assoc($res_activities);

   
?>
<html>

<head>
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <title>เพิ่มกิจกรรม</title>


    <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css" crossorigin="anonymous">

    <script type="text/javascript" src="jquery-3.2.1.min.js" ></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClN9BQptnCg0FkA_aJ7eNPb4_9KmHvF28&callback=initMap"
    type="text/javascript"></script>

    <script language="JavaScript">

    function initMap() { 
        var myOptions = {
        zoom: 16,
        center: new google.maps.LatLng(<?php echo $row_activities['lat']; ?>,<?php echo $row_activities['lng']; ?>),
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);


        var marker = new  google.maps.Marker({
            map:map,
            position: new google.maps.LatLng(<?php echo $row_activities['lat']; ?>,<?php echo $row_activities['lng']; ?>),
            draggalbe:true

        });

        var infowindow = new google.maps.InfoWindow({
            map:map,
            content:"ที่จัดกิจกรรมปัจจุบัน",
            position: new google.maps.LatLng(<?php echo $row_activities['lat']; ?>,<?php echo $row_activities['lng']; ?>)

        });

        google.maps.event.addListener(map,'click',function(event){
            infowindow.open(map,marker);
            infowindow.setContent("LatLng = " + event.latLng);
            infowindow.setPosition(event.latLng);
            marker.setPosition(event.latLng);

            $("#lat").val(event.latLng.lat());
            $("#lng").val(event.latLng.lng());

            
        });	

    }



    function saveLocation(){

    var location_name  = $("#location_name").val();
    var lat  = $("#lat").val();
    var lng  = $("#lng").val();
    var location_type  = $("#location_type option:selected").val();
    var location_detail = $("textarea#location_detail").val();


    var imgname = $('input[type=file]').val();
    var size = $('#image_file')[0].files[0].size;
    var ext = imgname.substr((imgname.lastIndexOf('.')+1));
        ext = ext.toLowerCase();
    if(ext == 'jpg'){
        if(size <= 1000000){
                
            
            $.ajax({
                method:"POST",
                url:"insert2.php",
                data: new FormData($('form')[0]),
                enctype: 'multipart/form-data',
                cache:false,
                contentType:false,
                processData:false
            }).done(function(){
                alert("OK");
            });
            
        }else{
            alert('ขนาดไฟล์ใหญ่เกินกว่าที่กำหนด');
        }
    }else{
        alert('ไฟล์ที่เลือกต้องเป็นชนิดรูปภาพเท่านั้น');
    }


    }



    </script>
</head>



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
                                        <form id="formnews" action="update_activities.php" method="post" enctype="multipart/form-data">
                                            <div class="form-example-wrap mg-t-30">
                                                <div class="cmp-tb-hd cmp-int-hd">
                                                    <h2>เพิ่มกิจกรรม</h2>
                                                </div>
                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">เลือกประเภทกิจกรรม</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <select name="atttype">
                                                                        <?php
                                                                                        $sql_acttype = "SELECT * FROM activities_type";//$sqlnews_type คือตั้งชื่อ
                                                                                        $res_acttype = mysqli_query($con,$sql_acttype);
                                                                                        while ($row_acttype = mysqli_fetch_assoc($res_acttype)){
                                                                                            if ($row_acttype['atttype_id']== $row_activities['atttype_id']){
                                                                                                echo '<option value="'.$row_acttype['atttype_id'].'" selected>'.$row_acttype['atttype_detail'].'</option>';
                                                                                            }else{
                                                                                            echo '<option value="'.$row_acttype['atttype_id'].'">'.$row_acttype['atttype_detail'].'</option>';
                                                                                            }
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
                                                                <label class="hrzn-fm">หัวข้อกิจกรรม</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <input type="text" name="activities_topic"
                                                                        value="<?php echo $row_activities['activities_topic']; ?>"
                                                                        class="form-control input-sm"
                                                                        placeholder="กรุณาใส่หัวข้อกิจกรรม">
                                                                </div>

                                                            </div>

                                                        
                                                            <div class="col-lg-1 col-md-3 col-sm-3 col-xs-2">
                                                                <label>หรือเลือก</label>
                                                            </div>


                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">กิจกรรมประจำ</label>
                                                            </div>

                                                            <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <select name="extra" disabled>
                                                                        <option value="" disabled selected>โปรดเลือก</option>
                                                                        <?php
                                                                                        $sql_extra = "SELECT * FROM activities_extra";//$sqlnews_type คือตั้งชื่อ
                                                                                        $res_extra = mysqli_query($con,$sql_extra);
                                                                                        while ($row_extra = mysqli_fetch_assoc($res_extra)){
                                                                                            
                                                                                            if ($row_extra['ex_id']== $row_activities['extra_status']){
                                                                                                echo '<option value="'.$row_extra['ex_id'].'" selected>'.$row_extra['ex_name'].'</option>';
                                                                                            }else{
                                                                                            echo '<option value="'.$row_extra['ex_id'].'">'.$row_extra['ex_name'].'</option>';
                                                                                            }
                                                                                        }
                                                                                            
                                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-example-int form-horizental mg-t-15">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">สถานที่จัดกิจกรม</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                <div>
                                                                   
                                                                        <div id="map_canvas" style="width:100%;height:100vh"></div>


                                                                            <div class="form-example-int form-horizental">
                                                                                <div class="form-group">
                                                                                    <div class="row">

                                                                                    <br>

                                                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                                            <label class="hrzn-fm">สถานที่</label>
                                                                                        </div>

                                                                                        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">
                                                                                        

                                                                                            <input type="text" class="form-control" id="location_name" name="location_name" placeholder="location name">

                                                                                        </div>

                                                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                                            <label class="hrzn-fm">ละติจูด</label>
                                                                                        </div>
                                                                                                                    

                                                                                        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">

                                                                                            <input type="text" class="form-control" id="lat" name="lat" value="<?php echo $row_activities['lat']; ?>">

                                                                                            
                                                                                        </div>

                                                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                                            <label class="hrzn-fm">ลองจิจูด</label>
                                                                                        </div>
                                                                                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                                                                                            <input type="text" class="form-control" id="lng" name="lng" value="<?php echo $row_activities['lng']; ?>">
                                                                                            
                                                                                        </div>
                                                                                    
                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            



                                                                            
                                                                            


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                



                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <label class="hrzn-fm">ภาคเรียนที่</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                                                <select name="term">
                                                                            <?php
                                                                                            $sql_term = "SELECT * FROM activities_term";//$sqlnews_type คือตั้งชื่อ
                                                                                            $res_term = mysqli_query($con,$sql_term);
                                                                                            while ($row_term = mysqli_fetch_assoc($res_term)){
                                                                                                if ($row_term['term_id'] == $row_activities['term_id']){
                                                                                                    echo '<option value="'.$row_term['term_id'].'" selected>'.$row_term['term_id'].'</option>';
                                                                                                }else{
                                                                                                echo '<option value="'.$row_term['term_id'].'">'.$row_term['term_id'].'</option>';
                                                                                                }
                                                                                            }
                                                                            ?>
                                                                    </select>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                <label class="hrzn-fm">ปีการศึกษา</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        

                                                                <select name="activities_year">
                                                                        <?php
                                                                                        $sql_year = "SELECT * FROM student_year";//$sqlnews_type คือตั้งชื่อ
                                                                                        $res_year = mysqli_query($con,$sql_year);
                                                                                        while ($row_year = mysqli_fetch_assoc($res_year)){
                                                                                            if ($row_year['year_id'] == $row_activities['activities_year']){
                                                                                                echo '<option value="'.$row_year['year_id'].'" selected>'.$row_year['year_id'].'</option>';
                                                                                            }else{
                                                                                            echo '<option value="'.$row_year['year_id'].'">'.$row_year['year_id'].'</option>';
                                                                                            }
                                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                <label class="hrzn-fm">หน่วยกิต</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <input type="text" name="activities_unit"
                                                                        value="<?php echo $row_activities['activities_unit']; ?>"
                                                                        class="form-control input-sm"
                                                                        placeholder="กรุณาใส่หัวหน่วยกิต">
                                                                </div>
                                                            </div>
            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">วันที่จัดกิจกรรม</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">                                                               
                                                                        <input type="datetime-local" name="activities_date"
                                                                        value="<?php $t = $row_activities['activities_date'];
                                                                        echo date('Y-m-d\TH:i:s', strtotime($t)); ?>">                                                          
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">วันที่สิ้นสุดกิจกรรม</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">                                                               
                                                                        <input type="datetime-local" name="time_out"
                                                                        value="<?php $t = $row_activities['time_out'];
                                                                        echo date('Y-m-d\TH:i:s', strtotime($t)); ?>">                                                          
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                               
                                                <input type="hidden" name="activities_id" value="<?php echo $row_activities['activities_id']; ?>">

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

