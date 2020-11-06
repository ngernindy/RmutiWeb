<?php
    	@header("content-type:application/json;charset=utf-8");
        @header("Access-Control-Allow-Origin: *");
        @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        include("connection.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $content = @file_get_contents('php://input'); 
            $json_data = @json_decode($content, true);
            // $join_id=$json_data["join_id"];
            $activities_id=$json_data["activities_id"];
            $student_id=$json_data["student_id"];
            $activities_unit=$json_data["activities_unit"];

            // $data_time=$json_data["date_time"];

            
        }else{
            // $activities_id="32";
            // $student_id="58342110223-6";



        } 

        


        $extra = substr($activities_id,2);

        $extraS = "SELECT * FROM activities_join WHERE student_id = '$student_id'";
        $res_extra = mysqli_query($con,$extraS);
        $row_extra = mysqli_fetch_assoc($res_extra);
    
        // while($row_extra = mysqli_fetch_assoc($res_extra)){
        // $extra1 = $row_extra['activities_id'];
        // $extra2 = substr($extra1,2);
    
        // }
        $extra1 = $row_extra['activities_id'];
        $extra2 = substr($extra1,2);
    
        if(isset($extra2)){
            if($extra != $extra2){

    
            }else{
                $activities_unit = 'ไม่นับ';
            }
        }else{
            
        }


      




        $่join = "SELECT * FROM activities_join WHERE student_id = '".$student_id."' AND activities_id = '".$activities_id."'";
        $res_join = mysqli_query($con,$่join);
        $row_join = mysqli_fetch_assoc($res_join);
        $activities = $activities_id;

        if($activities != $row_join['activities_id']){
            

            date_default_timezone_set('Asia/Bangkok');
            $today_date=date("Y-m-d h:i:s: ");
        
            $time_1 = "SELECT * FROM activities WHERE activities_id = '".$activities_id."'";
            $res_time = mysqli_query($con,$time_1);
            $row_time = mysqli_fetch_assoc($res_time);
        
            if($today_date>=$row_time['activities_date']&&$today_date<=$row_time['time_out']){
        
                $sql = "INSERT INTO activities_join (activities_id,student_id,date_time,join_unit) VALUES ('".$activities_id."','".$student_id."',NOW(),'$activities_unit' )" ; 
                $result = @$con->query($sql);   
                $data=array();
                if($result){                    
                    $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
                    
                    $tt = $row_join['join'];
                    $data[] = array("dbresult"=>$tt);

  
                }else{
                    $data[] = array("apistatus"=>"0");//ตอบ สถานะ เป็น  0 เมื่อไม่มีข้อมูล
                }
                echo json_encode($data);
        
                
                
        
            }else{
        
                    
        
        
            }

        }else{


        }





        // $sql = "INSERT INTO activities_join (activities_id,student_id,date_time) VALUES ('".$activities_id."','".$student_id."',NOW() )" ; 
        // $result = @$con->query($sql);   
        // $data=array();
        // if($result){
        //     $data[] = array("apistatus"=>"1");//ตอบ สถานะ เป็น 1 เมื่อมีข้อมูล
        // }else{
        //     $data[] = array("apistatus"=>"0");//ตอบ สถานะ เป็น  0 เมื่อไม่มีข้อมูล
        // }



        
        /**** write log sql ****/
        $date=@date("d/m/Y H:i:s");
        $message = $date."||".$sql."\r\n";
        $objFopen = @fopen("sql_log_insert.log", 'a+');
        @fwrite($objFopen, $message);
        @fclose($objFopen);       
?>