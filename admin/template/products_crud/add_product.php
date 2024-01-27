<?php
// Include the database connection file
include 'conexiune.php';

// Check if the form is submitted for adding a new product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_product"])) {
    $name = $_POST["product_name"];
    $img = "/igor/images/products/" . $_POST["product_img"]; // Add the image URL prefix
    $rating = $_POST["product_rating"];
    $price = $_POST["product_price"];

    // Insert the new product into the database
    $sql = "INSERT INTO products (name, img, rating, price) VALUES ('$name', '$img', '$rating', '$price')";
    if ($conexiune->query($sql) === TRUE) {
        // Redirect to the products page after adding the product
        header("Location: ../index.php");
        exit();
    } else {
        // Display an error message in case of an issue
        echo "Error: " . $sql . "<br>" . $conexiune->error;
    }
}

// Close the database connection
$conexiune->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Product - Igor Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #007bff;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Add New Product</h2>
                <form action="add_product.php" method="POST">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="product_name" required>

                    <label for="product_img">Product Image URL:</label>
                    <input type="text" name="product_img" required>

                    <label for="product_rating">Product Rating:</label>
                    <input type="text" name="product_rating" required>

                    <label for="product_price">Product Price:</label>
                    <input type="text" name="product_price" required>

                    <input type="submit" name="add_product" value="Add Product">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
