<?php
session_start();// Starting Session
?>



        <?php
            $creditor_name=$_POST["creditor_name"];
            $branch=$_POST["branch"];
            $area=$_POST["area"];
            $state=$_POST["state"];
            
           if($_POST["creditor_name"]=="" && $_POST["branch"]==""){  
                 echo "<script>alert('Registration  Fail - Please try again');window.location = 'creditors.php'</script>"; 
           }else{
                  include 'dbcon.php';
                  $sql="INSERT INTO creditor (creditor_name,branch,area,state) VALUES (?,?,?,?)";
                   //  echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
                  $stmt = mysqli_prepare($conn, $sql);
                          mysqli_stmt_bind_param($stmt, "ssss", $creditor_name,$branch,$area,$state);  
                          
                  if(mysqli_stmt_execute($stmt)){
                     //  $last_id = mysqli_insert_id($conn);
                      // echo "the id is".$last_id;
                    echo "<script>alert('Registration is Successful');window.location = 'creditors.php'</script>"; 
                  } 
                 mysqli_close($conn);
      
            }
        ?>
