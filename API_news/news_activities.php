<?php


@header("content-type:application/json;charset=utf-8");
@header("Access-Control-Allow-Origin: *");
@header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $content = @file_get_contents('php://input'); 
    $json_data = @json_decode($content, true);
    
    
}else{
    // $activities_id="32";
    // $student_id="";



}   
// $sql = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='4'";
// $sql = "SELECT * FROM news INNER JOIN newstype ON news.newstype_id=newstype.newstype_id WHERE newstype.newstype_id = '002' ORDER BY news_id AND news_date>=date_add(curdate(),interval -200 day) DESC";//ORDER BY คือการเรียงตามลำดับ ID
$sql = "SELECT * FROM news INNER JOIN newstype ON news.newstype_id=newstype.newstype_id WHERE newstype.newstype_id = '002' ORDER BY news_id DESC";//ORDER BY คือการเรียงตามลำดับ ID

        $result = @$con->query($sql);   
        $data=array();//เก็น json
        if($result->num_rows > 0){
            $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
            while($row = $result->fetch_assoc()) {
                $dbresult[] = array("news_id"=>$row["news_id"],"news_topic"=>$row["news_topic"],"news_detail"=>$row["news_detail"],"news_status"=>$row["news_status"],"news_date"=>$row["news_date"],"newstype_id"=>$row["newstype_id"],"show_status"=>$row["show_status"],"news_filename"=>$row["news_filename"]);
            }
            $data[] = array("dbresult"=>$dbresult);
        }else{
            $data[] = array("apistatus"=>"0");//ตอบ สถานะ เป็น  0 เมื่อไม่มีข้อมูล
        }
        echo json_encode($data);

//  $result = mysqli_query($con, $sql);
//  $coursesArray = array();
// while ($row = mysqli_fetch_assoc($result)) {
// $coursesArray[] = $row;
// }
// echo json_encode($coursesArray);

$date=@date("d/m/Y H:i:s");
$message = $date."||".$sql."\r\n";
$objFopen = @fopen("sql_log_news_activities.log", 'a+');
@fwrite($objFopen, $message);
@fclose($objFopen); 

?>