<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "library_users";
$conn = new mysqli($sname,$uname,$password,$db_name);
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}
?>