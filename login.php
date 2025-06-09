<?php 
ob_start();
session_start();
include("dbcon.php");

// Debugging: Check if database is connected
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo 'connected';

// Avoid SQL Injection by using Prepared Statements
$email = mysqli_real_escape_string($conn, $_POST['loginEmail']);
$password = mysqli_real_escape_string($conn, $_POST['pwd']);

$query = "SELECT * FROM LogDetails WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Could not look up user information: ' . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["uname"] = $email;

    if ($row['role_id'] == "5") {
        header("Location: student/studentDashboard.php");
    } else if ($row['role_id'] == "4") {
        header("Location: faculty/dashboard.php");
    } else if ($row['role_id'] == "3") {
        header("Location: classTeacherContainer.php");
    } else if ($row['role_id'] == "2") {
        header("Location: hodContainer.php");
    } else if ($row['role_id'] == "1") {
        header("Location: admin/adminDashboard.php");
    } else {
        header("Location: index.php");
    }
    exit(); // 🔴 Always use exit() after header() to stop execution
} else {
    header("Location: index.php");
    exit();
}

mysqli_close($conn);
ob_end_flush();
?>
