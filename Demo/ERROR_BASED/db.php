<?php
$host = 'db';
$dbname = 'sqli_demo';
$username = 'demo';
$password = 'demopassword';

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Error connecting to the database: " . $e->getMessage());
}
?>
