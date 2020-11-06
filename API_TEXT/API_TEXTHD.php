<?php


@header("content-type:application/json;charset=utf-8");
@header("Access-Control-Allow-Origin: *");
@header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $content = @file_get_contents('php://input'); 
    $json_data = @json_decode($content, true);
    // $student_id=$json_data["student_id"];
    $class_id=$json_data["class_id"];

    
    
}else{
    // $activities_id="32";
    // $student_id="";



}   
// $sql = "SELECT * FROM activities_join INNER JOIN activities ON activities_join.activities_id=activities.activities_id WHERE student_id = '$student_id ' AND atttype_id='4'";
$sql = "SELECT * FROM text_activities INNER JOIN students_class ON text_activities.class_id=students_class.class_id INNER JOIN activities_type ON text_activities.atttype_id=activities_type.atttype_id WHERE students_class.class_id = '".$class_id."' AND activities_type.atttype_id = '1'";

        $result = @$con->query($sql);   
        $data=array();//เก็น json
        if($result->num_rows > 0){
            $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
            while($row = $result->fetch_assoc()) {
                $dbresult[] = array("id"=>$row["id"],"topic"=>$row["topic"],"text1"=>$row["text1"],"text2"=>$row["text2"],"text3"=>$row["text3"],"class_id"=>$row["class_id"]);
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
$objFopen = @fopen("sql_log_API_textHD.log", 'a+');
@fwrite($objFopen, $message);
@fclose($objFopen); 

?>