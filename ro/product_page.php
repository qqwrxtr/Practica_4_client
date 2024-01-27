<?php
// Include fișierul de conexiune la bază de date
include 'conexiune.php';

// Preia ID-ul produsului din URL
$id = $_GET['id'];

// Interogare pentru a prelua datele pentru ID-ul specificat al produsului
$sql = "SELECT * FROM `products` WHERE id = $id";
$result = $conexiune->query($sql);

// Verifică dacă există rânduri în rezultat
if ($result->num_rows > 0) {
    // Preia detaliile produsului
    $row = $result->fetch_assoc();

    // Include structura paginii produsului
    include 'product_page_layout.php';
} else {
    echo "Produsul nu a fost găsit";
}

// Închide conexiunea
mysqli_close($conexiune);
?>
