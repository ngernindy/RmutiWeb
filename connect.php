<?php
$dsn='mysql:host=localhost;dbname=projectrmuti';
$user='root';

try{
    $con=new PDO($dsn, $user,"");
   

}catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


?>