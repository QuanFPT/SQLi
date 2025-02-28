<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Practice</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
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
            max-width: 400px;
            width: 100%;
        }

        .logo-container img {
            width: 100px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        a.button {
            text-decoration: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: #4CAF50;
            border-radius: 5px;
            text-align: center;
            transition: background 0.3s, transform 0.2s;
        }

        a.button:hover {
            background: #45A049;
            transform: translateY(-3px);
        }

        a.button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="https://nhanlucnganhluat.vn/uploads/images/6A440BA4/logo/2023-02/logo.png" alt="Logo">
        </div>
        <h1>SQL Injection Practice</h1>
        <div class="button-group">
            <a href="level1.php" class="button">Level 1</a>
            <a href="level2.php" class="button">Level 2</a>
            <a href="level3.php" class="button">Level 3</a>
        </div>
    </div>
</body>
</html>
