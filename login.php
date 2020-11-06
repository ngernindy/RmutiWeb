<?php 
				//connection
                  require"connection.php";
        //รับค่า user & password
                  $emp_username = mysqli_real_escape_string($con,$_POST['Username']);
                  $emp_password = mysqli_real_escape_string($con,$_POST['Password']);

                  // $salt ='trease5423tgdseryvfdsr88resdfjh';
                  // $hash_emp_password = hash_hmac('sha256',$emp_password,$salt);

                  $sql="SELECT * FROM employee Where emp_username=? AND emp_password=?";//ดึงข้อมูลจากตาราง employee โดยให้ฟิวล์ emp_username เท่ากับ ? และ emp_password เท่ากับ ?
                  $stmt = mysqli_prepare($con, $sql);//mysqli_prepare() เป็นฟังก์ชันใน PHP ใช้ในการเตรียมคำสั่ง SQL สำหรับการดำเนินการ Syntax Procedural style
                  mysqli_stmt_bind_param($stmt,"ss",$emp_username,$emp_password);//เชื่อมโยงตัวแปร $emp_username และ $emp_password ที่รับค่ามา
                  mysqli_execute($stmt); 
                  $result_user =mysqli_stmt_get_result($stmt);
                  if($result_user->num_rows == 1){
                    session_start();
                    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
                    $_SESSION['emp_id'] = $row_user['emp_id'];
                    $_SESSION["emp_name"] = $row_user["emp_name"];
                    $_SESSION["emp_status"] = $row_user["emp_status"];
                    if($_SESSION["emp_status"]=="ADMIN"){ //ถ้าเป็น admin ให้กระโดดไปหน้า home_page.php
                      $_SESSION['is_admin'] = ADMIN;
                      Header("Location: home_page.php");
                    }
                    if ($_SESSION["emp_status"]=="EMPLOYEE"){  //ถ้าเป็น employee ให้กระโดดไปหน้า home_page.php
                      $_SESSION['is_employee'] = EMPLOYEE;
                      Header("Location: home_page.php");
                    }

                    else if ($_SESSION["emp_status"]=="USER"){  //ถ้าเป็น user ให้กระโดดไปหน้า home_page.php
                      $_SESSION['is_user'] = USER;
                      Header("Location: home_page.php");
                    }
                    
                  }else{
                    echo "<script>"; //ถ้าไม่ตรงเงื่อนไขให้ alert แจ้งเตือน และถอยหลังกลับ 1 หน้า
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>"; 
                  }


?>