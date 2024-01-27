<?php
// Include the database connection file
include 'conexiune.php';

// Check if the form is submitted for adding or updating a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an ID is provided for updating
    if (isset($_POST["product_id"])) {
        $id = $_POST["product_id"];
        $name = $_POST["product_name"];
        $img = $_POST["product_img"];
        $rating = $_POST["product_rating"];
        $price = $_POST["product_price"];

        $sql = "UPDATE products SET name='$name', img='$img', rating='$rating', price='$price' WHERE id=$id";
        if ($conexiune->query($sql) === TRUE) {
            header("Location: products.php");
            exit();
        } else {
            echo "Error updating record: " . $conexiune->error;
        }
    } else {
        // If no ID is provided, it means it's for adding a new product
        $name = $_POST["product_name"];
        $img = $_POST["product_img"];
        $rating = $_POST["product_rating"];
        $price = $_POST["product_price"];

        $sql = "INSERT INTO products (name, img, rating, price) VALUES ('$name', '$img', '$rating', '$price')";
        if ($conexiune->query($sql) === TRUE) {
            header("Location: products.php");
            exit();
        } else {
            echo "Error adding record: " . $conexiune->error;
        }
    }
}

// Check if an ID is provided in the URL for updating
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT id, name, img, rating, price FROM products WHERE id=$id";
    $result = $conexiune->query($sql);
    $product = $result->fetch_assoc();
} else {
    // Initialize an empty product array if no ID is provided
    $product = array("id" => "", "name" => "", "img" => "", "rating" => "", "price" => "");
}

// Close the database connection
$conexiune->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add/Update Product</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your other CSS files and styles go here -->
    <link rel="stylesheet" href="your-other-styles.css">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Back to Dashboard</a>
    </nav>

    <div class="container mt-4">
        <!-- Add Product Form -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo isset($_GET['id']) ? 'Update Product' : 'Add Product'; ?></h5>
            </div>
            <div class="card-body">
                <form action="add_product.php" method="POST">
                    <!-- Include a hidden field for product ID -->
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" name="product_name" value="<?php echo $product['name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="product_img">Product Image URL:</label>
                        <input type="text" class="form-control" name="product_img" value="<?php echo $product['img']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="product_rating">Product Rating:</label>
                        <input type="text" class="form-control" name="product_rating" value="<?php echo $product['rating']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="product_price">Product Price:</label>
                        <input type="text" class="form-control" name="product_price" value="<?php echo $product['price']; ?>" required>
                    </div>

                    <button type="submit" name="add_product" class="btn btn-primary"><?php echo isset($_GET['id']) ? 'Update Product' : 'Add Product'; ?></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your other scripts go here -->
    <script src="your-other-scripts.js"></script>
</body>

</html>

