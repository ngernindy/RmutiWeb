<?php>
$sql = "SELECT * FROM students  INNER JOIN student_group ON students.group_id=student_group.group_id INNER JOIN student_subject ON students.subject_id=student_subject.subject_id WHERE year_id = '$row_student_year'  ORDER BY student_username DESC";//ORDER BY คือการเรียงตามลำดับ ID


        //INNER JOIN student_subject ON students.subject_id=student_subject.subject_id  ORDER BY student_username
        $res_student = mysqli_query($con,$sql);

?>