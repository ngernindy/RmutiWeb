<?php
// include "check-login.php";
if(!$_POST) {
	exit;
}
include "connection.php";
if($_POST['action'] == "add") {
	$sub = $_POST['sub'];
	$sql = "REPLACE INTO student_subject VALUES('', '$sub')";
	mysqli_query($con, $sql);
}
mysqli_close($con);
?>