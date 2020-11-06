<?php
    	@header("content-type:application/json;charset=utf-8");
        @header("Access-Control-Allow-Origin: *");
        @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        include("connection.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $content = @file_get_contents('php://input'); 
            $json_data = @json_decode($content, true);
            $student_id=$json_data["student_id"];
            $student_password=$json_data["student_password"];
            $student_telephone=$json_data["student_telephone"];
            $student_email=$json_data["student_email"];
            $student_address=$json_data["student_address"];


            
        }else{
            // $student_id="58342110224-6";
            // $student_password="1234";
            // $student_telephone = "0812345678";
            // $student_email = "bbb@gmail.com";
            // $student_address = "khonkaen";



        }   
        $sql = "UPDATE students SET student_password ='".$student_password."',student_telephone='".$student_telephone."',student_email='".$student_email."',student_address='".$student_address."' WHERE student_id = '".$student_id."'  " ; 
        $result = @$con->query($sql);   
        $data=array();
        if($result){
            $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
        }else{
            $data[] = array("apistatus"=>"0");//ตอบ สถานะ เป็น  0 เมื่อไม่มีข้อมูล
        }
        echo json_encode($data);
        /**** write log sql ****/
        $date=@date("d/m/Y H:i:s");
        $message = $date."||".$sql."\r\n";
        $objFopen = @fopen("sql_log_updatestudent.log", 'a+');
        @fwrite($objFopen, $message);
        @fclose($objFopen);       
?>