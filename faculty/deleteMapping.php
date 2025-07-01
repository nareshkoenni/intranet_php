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
            $id=$_GET["sno"];
           
                  include '../dbcon.php';
                  $sql="delete from course_branch where sno=?";
         
                  $stmt = mysqli_prepare($conn, $sql);
                  mysqli_stmt_bind_param($stmt, "s", $id);  
                // echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
                  
                  if(mysqli_stmt_execute($stmt)){
                      //echo "success".$id;
                    echo "<script>alert('Deletion is Successful');window.location = 'course.php'</script>"; 
                  } 
                 mysqli_close($conn);
      
            
        ?>
    </body>
</html>
