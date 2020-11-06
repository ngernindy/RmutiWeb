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

    $oldimg = "SELECT student_img FROM students WHERE student_id = '".$_FILES["photo"]["name"]."'";
    $resdel = mysqli_query($con,$oldimg);
    $pro_image = mysqli_fetch_array($resdel, MYSQLI_NUM);
    $filename = $pro_image[0];

    @unlink('images/'.$filename);



    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]).'.jpg';
    $nameimg = basename($_FILES["photo"]["name"]).'.jpg';
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		if (
            
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
            $sql ="UPDATE students SET student_img='$nameimg'WHERE student_id = '".$_FILES["photo"]["name"]."' ";
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
        $objFopen = @fopen("sql_log_updateimg.log", 'a+');
        @fwrite($objFopen, $message);
        @fclose($objFopen);       














    // $target_dir = "images/";
    // $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    // $uploadok = 1;
    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // $check = getimagesize($_FILES["photo"]["tmp_name"]);
    // if($check !== false){
    //     echo "File is an image --" .$check["mime"].".";
    //     $uploadok = 1;
    //     if(move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file))(
    //         echo "The file ".basename($_FILES["photo"]["name"]). "has been uploaded.";

    //     )else{
    //         echo "Sorry, there was an error uploading your file.";
    //     }
    // }else{
    //     echo "File is not an image.";
    //     $uploadok = 0;
    // }































    // @header("content-type:application/json;charset=utf-8");
    // @header("Access-Control-Allow-Origin: *");
    // @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');


    


    // function uploadimg(){
    //     $postdata = file_get_contents("php://input");
    //     if(isset($postdata)){
    //         $request = json_decode($postdata);
    //         $postData['image_base64'] = $request->image_base64;
    //         $postData['imageName'] = 'imgname';
    //         if(!empty($postData['image_base64'])){
    //             $img = str_replace('data:image/jpg;base64,','', $postData['image_base64']);
    //             $img = str_replace(' ','+', $img);
    //             $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i','',$img));
    //             $target_file = $_SERVER['DOCUMENT_ROOT'].'/upload_img/mobile_pic/pic_'.$postData['imageName'].'.jpg';


    //             if(file_put_contents($target_file, $data)){
    //                 echo json_encode(array('msg'=>'success'));

    //             }else{
    //                 echo json_encode(array('msg'=>'fail'));
    //             }
    //         }

    //     }
    // }
    // uploadimg();

    // @header("content-type:application/json;charset=utf-8");
    // header('Access-Control-Allow-Origin: *');
    // @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
    // $target_path = "C:/xampp/htdocs/WebProject/student_image";
 
    // $target_path = $target_path . basename( $_FILES['file']['name']);
 
    // if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    // echo "Upload and move success";
    // } else {
    // echo $target_path;
    // echo "There was an error uploading the file, please try again!";
    // }




    // @header("content-type:application/json;charset=utf-8");
    //     @header("Access-Control-Allow-Origin: *");
    //     @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
    //     include("connection.php");
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //         $content = @file_get_contents('php://input'); 
    //         $json_data = @json_decode($content, true);
    //         $student_id=$json_data["student_id"];
    //         $student_image=$json_data["student_image"];
       


            
    //     }else{
    //         // $student_id="58342110224-6";
    //         // $student_password="1234";
    //         // $student_telephone = "0812345678";
    //         // $student_email = "bbb@gmail.com";
    //         // $student_address = "khonkaen";



    //     }   

    //     $image_ext = pathinfo(basename($_FILES['student_image']['name']), PATHINFO_EXTENSION); 
    //     $new_image_name = 'student_' .uniqid().".".$image_ext; //uniqid คือการ สุ่มชื่อให้ไม่ซ้ำกัน
    //     $image_path = "student_image/"; //เก็บรูปไว้ใน  "../news_image/";
    //     $image_upload_path = $image_path.$new_image_name;//เอาชื่อมาต่อกัน
    //     $success = move_uploaded_file($_FILES['student_image']['tmp_name'],$image_upload_path);
    //     $sql_image ="UPDATE students SET student_img='$new_image_name'WHERE student_id='$student_id'";
    //     mysqli_query($con,$sql_image);
       
   


?>