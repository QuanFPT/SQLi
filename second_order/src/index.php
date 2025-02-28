<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second-Order SQLi Demo</title>
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
            margin-bottom: 20px;
        }

        .nav-links {
            margin-top: 20px;
        }

        .nav-links a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            padding: 8px 12px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="https://nhanlucnganhluat.vn/uploads/images/6A440BA4/logo/2023-02/logo.png" alt="Logo">
        </div>
        <h2>Welcome to Second-Order SQLi Demo</h2>
        <div class="nav-links">
            <a href="signup.php">Signup</a>
            <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>
