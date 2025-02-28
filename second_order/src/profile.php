<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    die("You must be logged in to view this page.");
}

$username = $_SESSION['username'];

// LỖ HỔNG SQLi: Không sử dụng prepared statement
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("No user found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .logo-container img {
            width: 100px;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .profile-details {
            margin: 20px 0;
            color: #555;
        }

        .logout {
            margin-top: 20px;
            padding: 10px;
            background-color: #f44336;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .logout:hover {
            background-color: #e53935;
        }

        .message-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f5e7;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .message-box a {
            color: #4CAF50;
            text-decoration: none;
        }

        .message-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="https://nhanlucnganhluat.vn/uploads/images/6A440BA4/logo/2023-02/logo.png" alt="Logo">
        </div>
        <h2>Welcome, <?= htmlspecialchars($user['username']) ?>!</h2>

        <!-- User profile details -->
        <div class="profile-details">
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <!-- Add more user details as needed -->
        </div>

        <!-- Message box for user actions -->
        <div class="message-box">
            <p>If you'd like to logout, click the button below:</p>
        </div>

        <form method="POST" action="logout.php">
            <button type="submit" class="logout">Logout</button>
        </form>
    </div>
</body>
</html>
