<?php 
    include_once('nav.php');
    include_once('js_and_css.php');
    require 'connection.php';
    // $student_id = $_GET['id'];
    $join_id = $_GET['id'];

    $sql = "SELECT * FROM activities_join INNER JOIN students ON activities_join.student_id=students.student_id WHERE join_id = '$join_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_join = mysqli_query($con,$sql);
    $row_join = mysqli_fetch_assoc($res_join); 


?>


<!DOCTYPE html>
<title>ภาพยืนยันกิจกรรม</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<style>


.circular--portrait {
  position: relative;
  width: 70px;
  height: 70px;
  overflow: hidden;
  border-radius: 50%;
}

.circular--portrait img {
  width: 100%;
  height: auto;
}
   
</style>



<script>


  function currentDiv(n) {
    showDivs(slideIndex = n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
    }
    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-opacity-off";
  }
</script>

<div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-list sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="contact-win">

                          <div class="circular--portrait">
                            <img src="images/<?php echo $row_join['student_img']; ?>" alt="" />
                          </div>
                            
                        <div class="contact-ctn">
                          <div class="contact-ad-hd">
                            <b>&nbsp;&nbsp;<?php echo $row_join['student_name'];?> <?php echo $row_join['student_lastname'];?></b>
                          </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
            </div>
        </div>
</div>
<br>

<div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-list sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="contact-win">
                            

                              <div class="w3-content" style="width:100%;height:100%;">
                                  <div class="w3-row-padding w3-section">
                                    <div class="w3-col s6">
                                        <img class="demo w3-opacity w3-hover-opacity-off" src="img_one/<?php echo $row_join['img_one'];?>" style="width:100%;height:100%;cursor:pointer" onclick="currentDiv(1)">
                                    </div>
                                    <div class="w3-col s6">
                                        <img class="demo w3-opacity w3-hover-opacity-off" src="img_two/<?php echo $row_join['img_two']; ?>" style="width:100%;height:100%;cursor:pointer" onclick="currentDiv(2)">
                                    </div>
                                  </div>


                                  <img class="mySlides" src="img_one/<?php echo $row_join['img_one'];?>" style="width:100%;display:none">
                                  <img class="mySlides" src="img_two/<?php echo $row_join['img_two']; ?>" style="width:100%">
                                  
                              </div>


                            
                        </div>
                        <div class="contact-ctn">
                          <div class="contact-ad-hd">
                            

                          </div>
                            
                        </div>
                        <div class="social-st-list">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
            </div>
        </div>
</div>
<?php
    include_once('footer.php');
?>






















<!-- <div class="w3-content" style="width:300px;height:200px;">
  <img class="mySlides" src="img_one/<?php echo $row_join['img_one'];?>" style="width:100%;display:none">
  <img class="mySlides" src="img_two/<?php echo $row_join['img_two']; ?>" style="width:100%">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s6">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img_one/<?php echo $row_join['img_one'];?>" style="width:100px;height:100px;cursor:pointer" onclick="currentDiv(1)">
    </div>
    <div class="w3-col s6">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img_two/<?php echo $row_join['img_two']; ?>" style="width:100px;height:100px;cursor:pointer" onclick="currentDiv(2)">
    </div>
  </div>
</div> -->



</body>
</html>












