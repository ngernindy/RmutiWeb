<?php
        require 'connection.php';
        
        $emp_username = $_POST['username'];
        $emp_password = $_POST['password'];
        $emp_name = $_POST['name'];
        $emp_lastname = $_POST['lastname'];
        $emp_phone = $_POST['phone'];
        $emp_email = $_POST['email'];
        $emp_status = $_POST['emp_status'];


        //เข้า รหัสผ่าน
       

      

       
       
      
       
        // $salt ='trease5423tgdseryvfdsr88resdfjh';
        // $hash_emp_password = hash_hmac('sha256',$emp_password,$salt);

        $query = "INSERT INTO employee(emp_username,emp_password,emp_name,emp_lastname,emp_phone,emp_email,emp_status) VALUES('$emp_username','$emp_password','$emp_name','$emp_lastname','$emp_phone','$emp_email','$emp_status')";
        // $query .=" WHERE student_id='$student_id'";
        $result = mysqli_query($con,$query);
        
        if($result){
            echo "<script>";
            echo "alert(\" บันทึกข้อมูลเรียบร้อย\");"; 
            echo "window.history.go(-2)";
            echo "</script>"; 

        }else{
            echo"เกิดข้อผิดพลาด". mysqli_error($con);

        }
        
        // mysqil_close($dbcon);
        $con = null;
        
         


?>