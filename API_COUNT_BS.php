<?php


@header("content-type:application/json;charset=utf-8");
@header("Access-Control-Allow-Origin: *");
@header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $content = @file_get_contents('php://input'); 
    $json_data = @json_decode($content, true);
    $student_id=$json_data["student_id"];
    
    
}else{
    // $activities_id="32";
    $student_id="";



}   
// $sql = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='4'";
// $sql = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '".$student_id."' AND atttype_id='2'";//ORDER BY คือการเรียงตามลำดับ ID
//   $sql = "SELECT SUM(activities_unit) AS TotalCD FROM activities INNER JOIN activities_join ON activities.activities_id=activities_join.activities_id WHERE atttype_id = '4' AND student_id = '".$student_id."' "; 
$sql="SELECT COUNT(activities.activities_id) AS countBS FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id  WHERE activities_join.student_id='".$student_id."' AND atttype_id ='7' ";

        $result = @$con->query($sql);   
        $data=array();//เก็น json
        if($result->num_rows > 0){
            $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
            while($row = $result->fetch_assoc()) {
                $dbresult[] = array("countBS"=>$row["countBS"]);
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
$objFopen = @fopen("sql_log_COUNT_BS.log", 'a+');
@fwrite($objFopen, $message);
@fclose($objFopen); 

?>