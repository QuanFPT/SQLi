<?php
function dbconnect() {
    $host = "mysql-db";
    $user = "lab_user";
    $pass = "lab_pass";
    $dbname = "sqli_lab";

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
