<?php
session_start();// Starting Session
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        
        <?php
            $course_id = $_POST["course_id"]; 
            $CO1 = $_POST["CO1"];
            $CO2 = $_POST["CO2"];
            $CO3 = $_POST["CO3"];
            $CO4 = $_POST["CO4"];
            $CO5 = $_POST["CO5"];
            $CO6 = $_POST["CO6"];
            $tb = $_POST["textbook"];
            $rb = $_POST["referencebook"];
            
            $sql3 = "select * from course where course_id='$course_id'";
            include '../dbcon.php';
           // echo "ERROR: Could not execute query:" . mysqli_error($conn);
        if(mysqli_num_rows(mysqli_query($conn, $sql3))>0) {
            echo "<script>alert('Already exist...');window.location = 'course.php'</script>"; 
        }else{
                  
                $sql = "INSERT INTO course (course_id, course_name,  CO1, CO2, CO3, CO4, CO5, CO6, textbook, referencebook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);

                if (!$stmt) {
                    die("Prepare failed: " . mysqli_error($conn));
                }

                mysqli_stmt_bind_param($stmt, "ssssssssss", $course_id, $course_id,  $CO1, $CO2, $CO3, $CO4, $CO5, $CO6, $tb, $rb);

                if (!mysqli_stmt_execute($stmt)) {
                    die("Execute failed: " . mysqli_stmt_error($stmt));
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                echo "<script>alert('Success');window.location = 'course.php'</script>"; 
        }          
           
        ?>
    </body>
</html>
