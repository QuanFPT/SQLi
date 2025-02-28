<?php
include 'db.php';

$error = $results = "";

// Xử lý khi người dùng submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $search = $_POST['search'];

    // Truy vấn SQL dễ bị tấn công UNION SQLi
    $query = "SELECT id, username FROM users WHERE username LIKE '%$search%'";
    var_dump($query);

    $result = $conn->query($query);

    if (!$result) {
        $error = "Database error: " . htmlspecialchars($conn->error);
    } elseif ($result->num_rows > 0) {
        $results = "<h3>Results:</h3><ul>";
        while ($row = $result->fetch_assoc()) {
            $results .= "<li>" . htmlspecialchars(print_r($row, true)) . "</li>";
        }
        $results .= "</ul>";
    } else {
        $error = "No results found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection UNION Demo</title>
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

        .main-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo-container img {
            width: 100px;
            height: auto;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 14px;
            color: #555;
        }

        input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #45A049;
            transform: translateY(-2px);
        }

        .error, .results {
            width: 100%;
            margin-top: 15px;
            font-size: 14px;
            text-align: left;
        }

        .error {
            color: #e74c3c;
        }

        .results {
            color: #4CAF50;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            list-style: disc;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="https://nhanlucnganhluat.vn/uploads/images/6A440BA4/logo/2023-02/logo.png" alt="Logo">
    </div>
    <div class="main-container">
        <h1>SQL Injection UNION Demo</h1>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($results): ?>
            <div class="results"><?php echo $results; ?></div>
        <?php endif; ?>
        <form method="POST">
            <label for="search">Search by Username:</label>
            <input type="text" id="search" name="search" required>
            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>
