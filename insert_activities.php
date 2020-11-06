<?php
    include 'connection.php';
    
    $activities_topic = $_POST['activities_topic'];//รับค่าโดยตั้งชื่อตัวแปร $newstype_id แล้วรับค่าโดยใช้ $_POST['newstype']; คือชื่อ input ที่ตั้งไว้ 
    $activities_unit = $_POST['activities_unit'];
    $term = $_POST['term'];
    $activities_year = $_POST['activities_year'];
    $activities_date = $_POST['activities_date'];
    $lng = $_POST['lng'];
    $lat = $_POST['lat'];
    $time_out = $_POST['time_out'];
    $atttype_id = $_POST['atttype'];


    

    $year = substr($activities_year,2,3);



 if($time_out > $activities_date){

 

            if (isset($_POST["extra"]) && !empty($_POST["extra"])) {

                $extra = $_POST['extra'];



                $่act = "SELECT * FROM activities ";
                $res_act = mysqli_query($con,$่act);
                $row_act = mysqli_fetch_assoc($res_act);

                $id = $year . $_POST["extra"];

                $extra_status = $_POST['extra'];


                $check = "SELECT * FROM activities WHERE  activities_id = '$id'";
                $result1 = mysqli_query($con,$check) or die(mysqli_error());
                $num=mysqli_num_rows($result1); 
                    if($num > 0)   		
                    {
                        
                        // $sql = "INSERT INTO activities(activities_id,activities_topic,activities_detail,activities_unit,activities_term,activities_year,activities_date,atttype_id,time_out)";
                        // $sql .=" VALUES ('".$year."".$extra."','$activities_topic','$activities_detail','$activities_unit','$activities_term','$activities_year','$activities_date','$atttype_id','$time_out')";

                        
    
                        // if($result){
                        //     echo "<script>";
                        //         echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
                        //         echo "window.history.go(-2)";
                        //     echo "</script>"; 
                
                        // }else{
                        //     echo "<script>";
                        //         echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
                        //         echo "window.history.back()";
                        //     echo "</script>"; 
                            
                        // }

                        echo "<script>";
                                echo "alert(\" กิจกรรมซ้ำ\");"; 
                                echo "window.history.go(-1)";
                        echo "</script>"; 

			
 
                    }else{


                        $sql = "INSERT INTO activities(activities_id,activities_topic,activities_unit,term_id,activities_year,activities_date,atttype_id,time_out,lat,lng,extra_status)";
                        $sql .=" VALUES ('".$year."".$extra."','$activities_topic','$activities_unit','$term','$activities_year','$activities_date','$atttype_id','$time_out','$lat','$lng','$extra_status')";

                        $result = mysqli_query($con,$sql);

    
                        if($result){
                            echo "<script>";
                                echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
                                echo "window.history.go(-2)";
                            echo "</script>"; 
                
                        }else{
                            echo "<script>";
                                echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
                                echo "window.history.back()";
                            echo "</script>"; 
                            
                        }

                        

                        
                
                    
                
                        }







              

                
            } else {  

                $extra_status = '0';
                $sql = "INSERT INTO activities(activities_topic,activities_unit,term_id,activities_year,activities_date,atttype_id,time_out,lat,lng,extra_status)";
                $sql .=" VALUES ('$activities_topic','$activities_unit','$term','$activities_year','$activities_date','$atttype_id','$time_out','$lat','$lng','$extra_status')";

               
                $result = mysqli_query($con,$sql);

                if($result){
                    echo "<script>";
                        echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
                        echo "window.history.go(-2)";
                    echo "</script>"; 
        
                }else{
                    echo "<script>";
                        echo "alert(\" เกิดข้อผิดพลาด .mysqli_error($con);\");"; 
                        echo "window.history.back()";
                    echo "</script>"; 
                    
                }



            }

   

}else{

        echo "<script>";
            echo "alert(\" ไม่สามารถเลือกวันที่สิ้นสุดก่อนเวลาเริ่มกิจกรรมได้\");"; 
            echo "window.history.back()";
        echo "</script>"; 

    }
        

    

?>