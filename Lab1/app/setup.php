<?php
include "./config.php";

$db = dbconnect();

$query = "CREATE TABLE IF NOT EXISTS prob_cobolt (
    id VARCHAR(50),
    pw VARCHAR(255)
)";
mysqli_query($db, $query);

$query = "INSERT INTO prob_cobolt (id, pw) VALUES 
    ('admin', MD5('adminpass')),
    ('user', MD5('userpass'))";
mysqli_query($db, $query);

echo "Setup completed!";
?>
