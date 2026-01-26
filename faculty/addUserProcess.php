<?php
session_start();

$branch     = $_POST["branch"];
$email      = $_POST["email"];
$password   = $_POST["password"];
$section    = $_POST["section"];
$role_id    = $_POST["role_id"];

if ($section == "") { 
    $section = " "; 
}

// Validation
if ($branch == "" || $email == "" || $password == "" || $role_id == "") {
    echo "<script>alert('All fields are required!'); window.location='users.php';</script>";
    exit;
}

include '../dbcon.php';

// Prevent duplicate email
$check = mysqli_query($conn, "SELECT email FROM LogDetails WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Email already exists!'); window.location='users.php';</script>";
    exit;
}

// (Optional) Secure password storage
//$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert Query with datetime field
$sql = "INSERT INTO LogDetails(email, password, last_login, role_id, section, branch) 
        VALUES (?, ?, NOW(), ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $email, $password, $role_id, $section, $branch);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('User Registered Successfully');window.location='users.php';</script>";
} else {
    echo "<script>alert('Error inserting record!');window.location='users.php';</script>";
}

mysqli_close($conn);
?>
