<?php include_once('nav.php');
    include 'connection.php';
    $news_id = $_GET['id'];

    $sql = "SELECT * FROM news WHERE news_id='$news_id'" ;//ดึงข้อมูลมาเฉพาะแถวที่มี id ข่าว
    $res_news = mysqli_query($con,$sql);
    $row_news = mysqli_fetch_assoc($res_news);
?>
<html>

<head>
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <title>ข่าวสาร</title>
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
                                            <div class="form-example-wrap mg-t-30">
                                                <div class="cmp-tb-hd cmp-int-hd">
                                                    <h2>แสดงข่าวสาร</h2>
                                                </div>                              
                                                <div class="form-example-int form-horizental mg-t-15">
                                                    <div class="row">                                                   
                                                        <div class="col-lg-12 col-md-12 col-6">
                                                            <a href="#" class="d-block mb-4 h-100">
                                                                <img class="img-fluid img-thumbnail"
                                                                    src="news_image/<?php echo $row_news['news_filename']?>"
                                                                    alt="" width="100%" height="100%">
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-6">   
                                                            <div >
                                                                <br>
                                                                <h2><?php echo $row_news['news_topic']; ?></h2>
                                                                <p><?php echo $row_news['news_detail']; ?></p>
                                                            </div> 
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-6">
                                                            <div class="row">
                                                                <h6 align="right"><?php echo $row_news['news_date']; ?></h6>              
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
        </div>
    </div>
</div>
<?php 
    include_once('footer.php');
?>

</html>
