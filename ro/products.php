<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produse | Hannes & Co.</title>
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/svg+xml" href="../images/header/favicon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <img src="../images/header/headerprod.jpg" style="display: none;">
    <?php include_once("particles/header.php") ?>

    <!-- Afișarea logo-urilor brandurilor -->
    <div class="brands">
        <div class="small-container">
            <div class="child">
                <div class="logo">
                    <img src="../images/logos/logo-adidas.png">
                </div>
                <div class="logo">
                    <img src="../images/logos/logo-nike.png">
                </div>
                <div class="logo">
                    <img src="../images/logos/logo-lv.png">
                </div>
                <div class="logo">
                    <img src="../images/logos/logo-versace.png">
                </div>
                <div class="logo">
                    <img src="../images/logos/logo-puma.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Afișarea catalogului de produse -->
    <div class="small-container">
        <div class="child child-2">
            <h2>Catalog</h2>
        </div>
        <div class="child">
            <?php
            // Include fișierul de conexiune la baza de date
            include 'conexiune.php';

            // Interogare pentru a prelua datele din tabela Products
            $sql = "SELECT * FROM `products`";
            $result = $conexiune->query($sql);

            // Verificare dacă există rânduri în rezultat
            if ($result->num_rows > 0) {
                // Afișare date pentru fiecare rând
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="childprods">';
                    echo '<a href="product_page.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '"></a>';
                    echo '<h4>' . $row['name'] . '</h4>';
                    echo '<div class="rating">';
                    for ($i = 0; $i < $row['rating']; $i++) {
                        echo '<i class="fa fa-star"></i>';
                    }
                    for ($i = 0; $i < 5 - $row['rating']; $i++) {
                        echo '<i class="fa fa-star-o"></i>';
                    }
                    echo '</div>';
                    echo '<p>' . $row['price'] . ' Lei</p>';
                    echo '</div>';
                }
            } else {
                // Afișare mesaj în cazul în care nu există rezultate
                echo "0 rezultate";
            }

            // Închide conexiunea (presupunând că $conn este variabila de conexiune în conexiune.php)
            mysqli_close($conexiune);
            ?>
        </div>
        <div class="page-btn">
            <span>&#8592;</span>
            <span><a href="products.html">1</a></span>
            <span>&#8594;</span>
        </div>
    </div>

    <?php include_once("particles/footer.php") ?>
    </div>

    <script src="../src/js/script.js"></script>
</body>
</html>
