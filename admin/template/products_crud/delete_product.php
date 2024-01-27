<?php
// Include the database connection file
include 'conexiune.php';

// Check if the product ID is set in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM products WHERE id=$id";
    if ($conexiune->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conexiune->error;
    }
}

// Close the database connection
$conexiune->close();
?>

<!-- Display the delete product form -->
<form action="delete_product.php" method="GET">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <p>Are you sure you want to delete this product?</p>
    <input type="submit" value="Delete Product">
</form>
