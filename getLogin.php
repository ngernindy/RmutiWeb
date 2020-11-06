<?php 
	@header("content-type:application/json;charset=utf-8");
	@header("Access-Control-Allow-Origin: *");
	@header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

	include("connection.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST") { 
		$content = @file_get_contents('php://input'); 
		$json_data = @json_decode($content, true);
		$student_id=@$json_data["student_id"];
		$student_password=@$json_data["student_password"];

	}else{
		//ใส่ค่าเพื่อทดสอบผ่าน browser
		$student_id="58342110223-6";
		$student_password="1234";	
	}

	/*** JSON ***/
	$sql = "SELECT student_id FROM students  WHERE student_id LIKE '".$student_id."' AND student_password LIKE '".$student_password."'" ;
	$result = @$con->query($sql);
	$data=array();
	if (@$result->num_rows > 0) {
		$data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
		while($row = $result->fetch_assoc()) {
			$dbresult[] = array("student_id"=>$row["student_id"]);
		}
		$data[] = array("dbresult"=>$dbresult);
	}else{
		$data[] = array("apistatus"=>"0");//ตอบ สถานะ เป็น 0 เมื่อไม่มีข้อมูล
	}
	echo json_encode($data);
	/**** write log sql ****/
	$date=@date("d/m/Y H:i:s");
	$message = $date."||".$sql."\r\n";
	$objFopen = @fopen("sql_log_login.log", 'a+');
	@fwrite($objFopen, $message);
	@fclose($objFopen);
	

	$con->close();
?>

