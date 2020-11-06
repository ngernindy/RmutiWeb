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
$sql = "SELECT * FROM students INNER JOIN students_class ON students.class_id=students_class.class_id INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE student_id = '".$student_id."' ";//ORDER BY คือการเรียงตามลำดับ ID

        $result = @$con->query($sql);   
        $data=array();//เก็น json
        if($result->num_rows > 0){
            $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
            while($row = $result->fetch_assoc()) {
                $dbresult[] = array("student_id"=>$row["student_id"],"student_name"=>$row["student_name"],"student_lastname"=>$row["student_lastname"],"year_id"=>$row["year_id"],"group_detaill"=>$row["group_detaill"],"class_id"=>$row["class_id"],"subject_name"=>$row["subject_name"],"student_telephone"=>$row["student_telephone"],"student_email"=>$row["student_email"],"student_address"=>$row["student_address"],"student_password"=>$row["student_password"],"student_img"=>$row["student_img"]);
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
$objFopen = @fopen("sql_log_API_student.log", 'a+');
@fwrite($objFopen, $message);
@fclose($objFopen); 

?>