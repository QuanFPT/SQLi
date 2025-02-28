<?php
include "./config.php";

$db = dbconnect();

if (!isset($_GET['id']) || !isset($_GET['pw'])) {
    echo("Enter id and passsword to login");
}
else{
    if (preg_match('/prob|\.|\(|\)/i', $_GET['id'])) exit("No Hack ~_~");
    if (preg_match('/prob|\.|\(|\)/i', $_GET['pw'])) exit("No Hack ~_~");
    
    $query = "SELECT id FROM prob_cobolt WHERE id='{$_GET['id']}' AND pw=MD5('{$_GET['pw']}')";
    echo "<h2>Query:</h2> <strong>$query</strong><br><br>";
    
    $result = mysqli_fetch_array(mysqli_query($db, $query));
    if ($result['id'] == 'admin') {
        echo "<h2>Welcome, admin! ESSCYBER{B4S1c_SQL_1j3ction}</h2>";
    } else {
        echo "<h2>Hello {$result['id']}<br>You are not admin :(</h2>";
    }
}
highlight_file(filename: __FILE__);
?>
