<?php
// Include database configuration
include_once('config.php');

$message = "";

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Vulnerable SQL query directly inserting user input (SQL Injection vulnerability)
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    // Execute the query using pg_query
    $result = pg_query($conn, $sql);

    if ($result) {
        // Check if any row matches the query (user authenticated)
        if (pg_num_rows($result) > 0) {
            $message = "Welcome " . htmlspecialchars($username);
        } else {
            $message = "Invalid username or password";
        }
    } else {
        // If the query fails
        $message = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo-container img {
            width: 80px;
            height: auto;
        }

        .main-container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 1200px;
        }

        .login-container {
            width: 40%;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .login-container h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .login-form label {
            font-size: 14px;
            color: #555;
            text-align: left;
        }

        .login-form input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .login-form input:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        .login-form button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-form button:hover {
            background-color: #45A049;
            transform: translateY(-2px);
        }

        .error {
            color: #e74c3c;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .code-container {
            width: 55%;
            padding: 20px;
            background: #111;
            border-radius: 10px;
            color: #0f0;
            font-family: monospace;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            overflow: auto;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="https://nhanlucnganhluat.vn/uploads/images/6A440BA4/logo/2023-02/logo.png" alt="Logo">
    </div>
    
    <div class="main-container">
        <div class="login-container">
            <h1>Login</h1>
            <form method="post" class="login-form">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>

                <button type="submit">Login</button>
            </form>
            <?php if ($message): ?>
                <p class="error"><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
        </div>

        <div class="code-container">
            <h3>PHP Code:</h3>
            <pre>
&lt;?php
// Include database configuration
include_once('config.php');

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Vulnerable SQL query
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    // Execute the query
    $result = pg_query($conn, $sql);

    if ($result) {
        if (pg_num_rows($result) > 0) {
            $message = "Welcome " . htmlspecialchars($username);
        } else {
            $message = "Invalid username or password";
        }
    }
}
?&gt;
            </pre>
        </div>
    </div>
</body>
</html>
