<?php
require '../connection.php';
$year = $_POST['yearselect'];
$group = $_POST['groupselect'];
$subject = $_POST['subjectselect'];
require_once __DIR__ . '/../vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf([
// 	'default_font_size' => 12,
// 	'default_font' => 'sarabun'
// ]);

// $topic = '<h1>สวัสดี</h1>';
// $mpdf->WriteHTML($topic);
// $mpdf->Output();

date_default_timezone_set('Asia/Bangkok');
 $today_date=date("d/m/Y");
 $today_time=date("h:i");



 //ตั้งค่าการเชื่อมต่อฐานข้อมูล


 if (!$con) {
	 die("Connection failed: " . mysqli_connect_error());
 }

 $sql = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE student_subject.subject_id = '$subject' AND student_group.group_id='$group'AND year_id = '$year' ORDER BY student_id ASC";
 
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
             <td style="border-right:1px solid #000;padding:3px;" ></td>
			 <td style="border-right:1px solid #000;padding:3px;" ></td>
             <td style="border-right:1px solid #000;padding:3px;" ></td>
             <td style="border-right:1px solid #000;padding:3px;" ></td>

			 

			 
		 </tr>';
		 $i++;
         $topic = $row['subject_name'];
         $group_name = $row['group_detaill'];
		 $year_detail = $row['year_id'];

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
<h4 style="text-align:center">กลุ่มเรียน '.$group_name.'<br>ปีการศึกษา '.$year_detail.'</h4>

<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
 <tr style="border:1px solid #000;padding:4px;">
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;รหัสนักศึกษา</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="15%">ชื่อ</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="15%">นามสกุล</td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="10%"></td>
	 <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%"></td>
     <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%"></td>
     <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%"></td>


 </tr>

</thead>
 <tbody>';
 
$end = '</tbody>
</table>
<h4 style="text-align:right">พิมพ์วันที่ '.$today_date.' เวลา '.$today_time.' น </h4>
';

$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->Output();

?>