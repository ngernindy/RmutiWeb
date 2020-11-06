<?php 
    include_once('nav.php');?>
<?php ?>


<?php 

    if (!$_SESSION["emp_id"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

    }else{?>
    <!doctype html>
        <html>
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
            <!-- <p><a href="logout.php">Log out</strong></a></p>
            <p>&nbsp;</p> -->

            </body>

        </html>
<?php }?>