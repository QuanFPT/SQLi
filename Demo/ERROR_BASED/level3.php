<?php
include 'db.php';

$is_valid = false;
$products = [];
$all_ids = [];

// Lấy tất cả ID từ cơ sở dữ liệu để hiển thị trong dropdown
$id_query = "SELECT * FROM products";
$id_result = $conn->query($id_query);

if ($id_result) {
    $all_ids = $id_result->fetch_all(MYSQLI_ASSOC);
}

// Khi người dùng submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Truy vấn SQL dễ bị tấn công Boolean-based SQLi
    $query = "SELECT * FROM products WHERE id = '$product_id' AND visible=1";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $is_valid = true;
        $products = $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background: #fff;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
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
            font-size: 24px;
        }

        h2 {
            margin-top: 20px;
            font-size: 20px;
            color: #333;
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
            text-align: left;
        }

        .dropdown button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #555;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            text-align: left;
            cursor: pointer;
            position: relative;
            transition: background-color 0.3s ease;
        }

        .dropdown button:hover {
            background-color: #f1f1f1;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            width: 100%;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            z-index: 1;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .dropdown-content button {
            padding: 10px;
            width: 100%;
            background: none;
            border: none;
            text-align: left;
            color: #333;
            cursor: pointer;
        }

        .dropdown-content button:hover {
            background-color: #f9f9f9;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Results List */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-top: 15px;
        }

        ul li {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #e3f2fd;
        }

        ul li:nth-child(odd) {
            background-color: #bbdefb;
        }

        /* Error Message */
        p {
            color: #e74c3c;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="https://nhanlucnganhluat.vn/uploads/images/6A440BA4/logo/2023-02/logo.png" alt="Logo">
    </div>

    <div class="container">
        <h1>Search Products</h1>
        <form method="POST" action="">
            <div class="dropdown">
                <button type="button">Select Product ID</button>
                <div class="dropdown-content">
                    <?php if (!empty($all_ids)): ?>
                        <?php foreach ($all_ids as $row): ?>
                            <button type="submit" name="product_id" value="<?= htmlspecialchars($row['id']) ?>">
                                ID <?= htmlspecialchars($row['id']) ?>
                            </button>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No products available</p>
                    <?php endif; ?>
                </div>
            </div>
        </form>

        <h2>Results:</h2>
        <?php if (!empty($products)): ?>
            <ul>
                <?php foreach ($products as $product): ?>
                    <li>ID: <?= htmlspecialchars($product['id']) ?> - Name: <?= htmlspecialchars($product['name']) ?> - Price: $<?= htmlspecialchars($product['price']) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
