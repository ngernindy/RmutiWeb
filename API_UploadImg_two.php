<?php
    @header("content-type:application/json;charset=utf-8");
    @header("Access-Control-Allow-Origin: *");
    @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');       
    include("connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $content = @file_get_contents('php://input'); 
        $json_data = @json_decode($content, true);
        $id=$json_data["id"];
       


        
    }else{
        // $student_id="58342110224-6";
        // $student_password="1234";
        // $student_telephone = "0812345678";
        // $student_email = "bbb@gmail.com";
        // $student_address = "khonkaen";



    }   



    $target_dir = "img_two/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]).'.jpg';
    $nameimg = basename($_FILES["photo"]["name"]).'.jpg';
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
            $sql ="UPDATE activities_join SET img_two ='$nameimg'WHERE join_id = '".$_FILES["photo"]["name"]."' ";
            $result = @$con->query($sql);  
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
    }

    
    


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
        $objFopen = @fopen("sql_log_Uploadlmg_two.log", 'a+');
        @fwrite($objFopen, $message);
        @fclose($objFopen);       



?>