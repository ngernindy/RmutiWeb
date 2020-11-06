<?php include_once('nav.php');
    include 'connection.php';
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
        center: new google.maps.LatLng(16.42826430418058,102.86359548568726),
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);


        var marker = new  google.maps.Marker({
            map:map,
            position: new google.maps.LatLng(16.42826430418058,102.86359548568726),
            draggalbe:true

        });

        var infowindow = new google.maps.InfoWindow({
            map:map,
            content:"ปักหมุดเพื่อเลือกสถานที่",
            position: new google.maps.LatLng(16.42826430418058,102.86359548568726)

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
                                        <form id="formnews" action="insert_activities.php" method="post" enctype="multipart/form-data">
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
                                                                                            echo '<option value="'.$row_acttype['atttype_id'].'">'.$row_acttype['atttype_detail'].'</option>';
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
                                                                        class="form-control input-sm"
                                                                        placeholder="กรุณาใส่หัวข้อกิจกรรม"
                                                                        required>
                                                                        
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
                                                                    <select name="extra">
                                                                        <option value="" disabled selected>โปรดเลือก</option>
                                                                        <?php
                                                                                        $sql_extra = "SELECT * FROM activities_extra";//$sqlnews_type คือตั้งชื่อ
                                                                                        $res_extra = mysqli_query($con,$sql_extra);
                                                                                        while ($row_extra = mysqli_fetch_assoc($res_extra)){
                                                                                            echo '<option value="'.$row_extra['ex_id'].'">'.$row_extra['ex_name'].'</option>';
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

                                                                                            <input type="text" class="form-control" id="lat" name="lat" placeholder="Lat">

                                                                                            
                                                                                        </div>

                                                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                                            <label class="hrzn-fm">ลองจิจูด</label>
                                                                                        </div>
                                                                                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                                                                                            <input type="text" class="form-control" id="lng" name="lng" placeholder="Lng">
                                                                                            
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
                                                                <select class="chosen" name="term" required >
                                                                        <option value="" disabled selected>โปรดเลือกภาคเรียน</option>
                                                                        <?php 
                                                                        $sql_term = "SELECT * FROM activities_term";
                                                                        $res_term = mysqli_query($con,$sql_term);
                                                                        while ($row_term = mysqli_fetch_assoc($res_term)){
                                                                            echo '<option value="'.$row_term['term_id'].'">'.$row_term['term_id'].'</option>';
                                                                        
                                                                            
                                                                        }
                                                                        

                                                                    ?>


                                                                </select>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                <label class="hrzn-fm">ปีการศึกษา</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <!-- <div class="nk-int-st">
                                                                    <input type="text" name="activities_year"
                                                                        class="form-control input-sm"
                                                                        placeholder="กรุณาใส่ปีการศึกษา"
                                                                        required>
                                                                </div> -->

                                                                <select class="chosen" name="activities_year" required >
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
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                <label class="hrzn-fm">หน่วยกิต</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <input type="text" name="activities_unit"
                                                                        class="form-control input-sm"
                                                                        placeholder="กรุณาใส่หัวหน่วยกิต"
                                                                        required>
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
                                                                        <input type="datetime-local" name="activities_date"required>                                                          
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">วันที่สิ้นสุดกิจกรรม</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">                                                               
                                                                        <input type="datetime-local" name="time_out" required>  

                                                                                                                 
                                                                </div>
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
