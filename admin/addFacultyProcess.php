<?php
session_start();// Starting Session
?>



        <?php
            $faculty_id=$_POST["faculty_id"];
            $faculty_name=$_POST["faculty_name"];
            $branch=$_POST["branch"];
            $mobile_number=$_POST["mobile_number"];
            $email=$_POST["email"];
            $comm_address=$_POST["comm_address"];
            $perm_address=$_POST["perm_address"];
            $role_id=$_POST["role_id"];
            $blood_group=$_POST["blood_group"];
            
            
            
           if($_POST["faculty_id"]=="" && $_POST["faculty_name"]==""){  
                 echo "<script>alert('Registration  Fail - Please try again');window.location = 'adminDashboard.php'</script>"; 
           }else{
                   include '../dbcon.php';		

                  
                  $sql="INSERT INTO faculty(faculty_id,faculty_name,branch,mobile_number,email,comm_address,perm_address,role_id,blood_group) VALUES (?,?,?,?,?,?,?,?,?)";
                  echo mysqli_error($conn);
                  $stmt = mysqli_prepare($conn, $sql);
                  mysqli_stmt_bind_param($stmt, "sssssssis", $faculty_id,$faculty_name,$branch,$mobile_number,$email,$comm_address,$perm_address,$role_id,$blood_group);  
                  if(mysqli_stmt_execute($stmt)){
                     //  $last_id = mysqli_insert_id($conn);
                      // echo "the id is".$last_id;
                    echo "<script>alert('Registration is Successful');window.location = 'adminDashboard.php'</script>"; 
                  } 
                 mysqli_close($conn);
      
            }
        ?>
