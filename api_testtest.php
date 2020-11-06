<?php
header('Access-Control-Allow-Origin: *'); 
header("Content-type:application/json; charset=UTF-8");    
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 
require_once("dbconnect.php");
$json_data = array();
$sql = "
SELECT * FROM tbl_provinces WHERE 1 ORDER BY province_id
";
$result = $mysqli->query($sql);
if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $json_data[] = array(
            "id" => $row['province_id'],
            "name" => $row['province_name'],
            "geo_id" => $row['geo_id']                
        );
    }
}
// แปลง array เป็นรูปแบบ json string  
if(isset($json_data)){  
    $json= json_encode($json_data);    
    if(isset($_GET['callback']) && $_GET['callback']!=""){    
    echo $_GET['callback']."(".$json.");";        
    }else{    
    echo $json;    
    }    
}
?>