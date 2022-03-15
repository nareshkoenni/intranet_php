<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
    include("dbcon.php");
    $uname=$_SESSION['uname'];
    date_default_timezone_set("Asia/Kolkata");
    $query="UPDATE LogDetails set last_login=now() where email='$uname'";
    mysqli_query($conn, $query);
    //echo "ERROR" . mysqli_error($conn);
    // echo "ERROR" . mysqli_error($conn);
    //echo "ERROR" . mysqli_error($conn);
    mysqli_stmt_execute($stmt1);
    mysqli_close($conn);  
    
// remove all session variables
//session_unset();

// destroy the session
session_destroy();
echo header("Location:./index.php");
?>

</body>
</html>