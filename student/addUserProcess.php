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
            $login_mail_id=$_POST["login_mail_id"];
            $password=$_POST["password"];
            $role_id=$_POST["role_id"];
            
           if($_POST["login_mail_id"]=="" && $_POST["password"]==""){  
                 echo "<script>alert('Registration  Fail - Please try again');window.location = 'home.php'</script>"; 
           }else{
                  //  echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
                  include 'dbcon.php';
                  $sql="INSERT INTO user (login_mail_id,password,role_id) VALUES (?,?,?)";
         
                  $stmt = mysqli_prepare($conn, $sql);
                          mysqli_stmt_bind_param($stmt, "sss", $login_mail_id,$password,$role_id);  
                  if(mysqli_stmt_execute($stmt)){
                    echo "<script>alert('Registration is Successful');window.location = 'users.php'</script>"; 
                      
                  } 
                 mysqli_close($conn);
      
            }
        ?>
    </body>
</html>
