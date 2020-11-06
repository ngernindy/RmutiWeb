<?php
include("connection.php");
header("Access-Control-Allow-Origin: *");
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM activities";
 $result = mysqli_query($con, $sql);
 $coursesArray = array();
while ($row = mysqli_fetch_assoc($result)) {
$coursesArray[] = $row;
}
echo json_encode($coursesArray);
?>
