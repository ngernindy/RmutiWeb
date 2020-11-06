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
    // $student_id="";



}   
// $sql = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='4'";
$sql = "SELECT * FROM activities INNER JOIN activities_join ON activities.activities_id = activities_join.activities_id INNER JOIN activities_type ON activities.atttype_id = activities_type.atttype_id INNER JOIN cal ON activities.atttype_id = cal.atttype_id WHERE activities_join.student_id = '".$student_id."'";//ORDER BY คือการเรียงตามลำดับ ID

        $result = @$con->query($sql);   
        $data=array();//เก็น json
        if($result->num_rows > 0){
            $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
            while($row = $result->fetch_assoc()) {
                $dbresult[] = array("activities_id"=>$row["activities_id"],"activities_topic"=>$row["activities_topic"],"activities_unit"=>$row["activities_unit"],"term_id"=>$row["term_id"],"activities_year"=>$row["activities_year"],"activities_date"=>$row["activities_date"],"time_out"=>$row["time_out"],"atttype_id"=>$row["atttype_id"],"lat"=>$row["lat"],"lng"=>$row["lng"],"act_status"=>$row["act_status"],"cal_id"=>$row["cal_id"],"cal_detail"=>$row["cal_detail"],"atttype_detail"=>$row["atttype_detail"]);
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
$objFopen = @fopen("sql_log_API_typeact.log", 'a+');
@fwrite($objFopen, $message);
@fclose($objFopen); 

?>