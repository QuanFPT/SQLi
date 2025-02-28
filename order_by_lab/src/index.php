<?php
// config.php
$config = [
    'db_host' => 'db',
    'db_user' => 'store_user',
    'db_pass' => 'store_password',
    'db_name' => 'ess_store'
];

// functions.php
function detect_hacker($input) {
    // Cố tình để lỗ hổng cho mục đích học tập
    return $input;
}

// index.php
session_start();
$conn = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order_by = "name";
if (isset($_GET['order_by'])) {
    $order_by = detect_hacker($_GET['order_by']);
}

$sql = "SELECT * FROM products ORDER BY $order_by";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESS Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            transition: transform 0.3s;
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .product-image {
            height: 250px;
            object-fit: contain;
            padding: 15px;
            cursor: pointer; /* Con trỏ chuột khi hover ảnh */
        }
        .price {
            font-size: 1.25rem;
            color: #dc3545;
            font-weight: bold;
        }
        .stock-badge {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop"></i> ESS Store
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col">
                <h2 class="text-center mb-4">Our Products</h2>
                <div class="d-flex justify-content-center mb-4">
                    <div class="btn-group">
                        <a href="?order_by=name" class="btn btn-outline-primary">Sort by Name</a>
                        <a href="?order_by=price" class="btn btn-outline-primary">Sort by Price</a>
                        <a href="?order_by=quantity" class="btn btn-outline-primary">Sort by Quantity</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col">
                    <div class="card product-card">
                        <span class="badge bg-<?php echo $row['quantity'] > 0 ? 'success' : 'danger'; ?> stock-badge">
                            <?php echo $row['quantity'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
                        </span>
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" 
                             class="card-img-top product-image" 
                             alt="<?php echo htmlspecialchars($row['name']); ?>"
                             data-bs-toggle="modal" 
                             data-bs-target="#imageModal" 
                             onclick="showImage('<?php echo htmlspecialchars($row['image_url']); ?>', '<?php echo htmlspecialchars($row['name']); ?>')">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <div class="mt-auto">
                                <p class="price mb-2">$<?php echo number_format($row['price'], 2); ?></p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Available: <?php echo $row['quantity']; ?> units
                                    </small>
                                </p>
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Modal để hiển thị ảnh -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light mt-5 py-3">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 ESS Store</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script>
        function showImage(imageUrl, imageName) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('imageModalLabel').textContent = imageName;
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>