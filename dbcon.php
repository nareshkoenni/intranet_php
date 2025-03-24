<?php

$conn = mysqli_connect("127.0.0.1:3306", "root", "", "intranet"); //prod
//$conn = mysqli_connect("127.0.0.1:8889", "root", "root", "intranet");  //local

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



