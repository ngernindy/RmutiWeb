<?php
require '../connection.php';
$activities_id = $_GET['id'];
require_once __DIR__ . '/../vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf([
// 	'default_font_size' => 12,
// 	'default_font' => 'sarabun'
// ]);

// $topic = '<h1>สวัสดี</h1>';
// $mpdf->WriteHTML($topic);
// $mpdf->Output();





 //ตั้งค่าการเชื่อมต่อฐานข้อมูล


 if (!$con) {
	 die("Connection failed: " . mysqli_connect_error());
 }
 $countStudent="SELECT COUNT(student_id) AS countStudent FROM activities_join WHERE activities_id='$activities_id'";
 $resultcount=$con->query($countStudent);
 while ($row_cstudent = $resultcount->fetch_assoc()) {
 $Cstudent = $row_cstudent['countStudent'];
 // echo $row_cstudent['countStudent'];
 }
 $typee = "SELECT * FROM activities INNER JOIN activities_type ON activities.atttype_id = activities_type.atttype_id  WHERE activities.activities_id='$activities_id'";
 $result_type = mysqli_query($con,$typee);
 while($row_type = mysqli_fetch_assoc($result_type)) {
	$type_id = $row_type['atttype_detail'];
 }
 
 date_default_timezone_set('Asia/Bangkok');
 $today_date=date("d-m-Y");
 $today_time=date("h:i");

 $sql = "SELECT * FROM activities_join INNER JOIN students ON activities_join.student_id=students.student_id INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id INNER JOIN activities ON activities_join.activities_id=activities.activities_id  WHERE activities_join.activities_id='$activities_id' ORDER BY students.subject_id";
 $result = mysqli_query($con, $sql);
 $content = "";
 if (mysqli_num_rows($result) > 0) {
	 $i = 1;
	 while($row = mysqli_fetch_assoc($result)) {
		 $content .= '<tr style="border:1px solid #000;">
			 <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
			 <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['student_id'].'</td>
			 <td style="border-right:1px solid #000;padding:3px;" >'.$row['student_name'].'</td>
			 <td style="border-right:1px solid #000;padding:3px;" >'.$row['student_lastname'].'</td>
			 <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['subject_name'].'</td>
			 <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['group_detaill'].'</td>
			 <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['year_id'].'</td>

			 
		 </tr>';
		 $i++;
		 $topic = $row['activities_topic'];
		 $year = $row['activities_year'];
		 $unit = $row['join_unit'];


		 
	 }
 }
 
 mysqli_close($con);
 
// $mpdf = new mPDF();
$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 12,
	'default_font' => 'sarabun'
]);

$head = '
<style>
 body{
	 
 }
</style>

<h2 style="text-align:center">'.$topic.'</h2>
<h4 style="text-align:center">ปีการศึกษา '.$year.'</h4>
<h4 style="text-align:center">ด้าน '.$type_id.' จำนวนหน่วย '.$unit.'</h4>


<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
 <tr style="border:1px solid #000;padding:4px;">
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;รหัสนักศึกษา</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="15%">ชื่อ</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="15%">นามสกุล</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="20%">สาขา</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%">กลุ่ม</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%">ปี</td>

 </tr>

</thead>
 <tbody>';

$end = '</tbody>
</table>
<h4 style="text-align:right">จำนวนนักศึกษาที่เข้าร่วม '.$Cstudent.' คน</h4>
<h4 style="text-align:right">พิมพ์วันที่ '.$today_date.' เวลา '.$today_time.' น </h4>

';


$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->Output();

?>