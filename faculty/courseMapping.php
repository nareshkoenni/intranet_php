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
            $branch = $_POST["Branch"]; 
            $batch = substr($_POST["Batch"], 0, 2);
            $sem = $_POST["Semester"];
            $course=$_POST["Course"];
            $section=$_POST["Section"];
            $sql3 = "select * from course_branch where branch='$branch' and sem='$sem' and regulation='$batch' and course_id='$course' and section='$section'";
            include '../dbcon.php';
           // echo "ERROR: Could not execute query:" . mysqli_error($conn);
        if(mysqli_num_rows(mysqli_query($conn, $sql3))>0) {
            echo "<script>alert('Already mapped...');window.location = 'course.php'</script>"; 
        }else{
                  
                $sql = "INSERT INTO course_branch (branch, sem, regulation, course_id, section) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);

                if (!$stmt) {
                    die("Prepare failed: " . mysqli_error($conn));
                }

                mysqli_stmt_bind_param($stmt, "sssss", $branch, $sem, $batch, $course, $section);

                if (!mysqli_stmt_execute($stmt)) {
                    die("Execute failed: " . mysqli_stmt_error($stmt));
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                echo "<script>alert('Mapping is Successful');window.location = 'course.php'</script>"; 
        }          
           
        ?>
    </body>
</html>
