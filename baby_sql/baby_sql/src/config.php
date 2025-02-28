<?php
// Thông tin cấu hình cơ sở dữ liệu
$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'sqli_lab';
$user = getenv('DB_USER') ?: 'postgres';
$password = getenv('DB_PASSWORD') ?: 'postgres123';

// Create a connection to the PostgreSQL database
$connectionString = "host=$host dbname=$dbname user=$user password=$password";
$conn = pg_connect($connectionString);

// Check the connection
if (!$conn) {
    die("Error: Unable to connect to the database.");
}
?>