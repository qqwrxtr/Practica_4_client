<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rita^SHOP</title>
        <link rel="stylesheet" href="../src/css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" type="image/svg+xml" href="../images/header/favicon.svg">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    </head>
    <body>
    <?php include_once("particles/header.php") ?>
        
        <div class="headerimg" >
            <h1>Doresti ceva schimbari?</h1>
            <h3>Cu ajutorul hainelor noastre poti schimba viata!</h3>
            <a href="products.html" class="btn">Cumpara Acum &#8594;</a>
        </div>
        <div class="offer">
            <div class="small-container">
                <div class="child">
                    <div class="halfchild">
                        <img src="../images/products/product-4.webp" class="offer-img" >
                    </div>
                    <div class="halfchild">
                        <p>Exclusiv</p>
                        <h1>Versace</h1>
                        <small>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam cumque tempora, corrupti et dolor quibusdam explicabo perferendis praesentium recusandae! Soluta, possimus maiores consequatur maxime architecto exercitationem repellat veritatis officia ea.<br>
                        </small>
                        <a href="vmtm.html" class="btn">Cumpara acum &#8594;</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-container">
            <h2>Produse Populare</h2>
            <div class="line1"></div>
            <div class="child">
            <?php
    // Include fișierul de conexiune la bază de date
    include 'conexiune.php';

    // Preia trei produse aleatoare din baza de date
    $sql = "SELECT id, name, img, rating, price FROM products ORDER BY RAND() LIMIT 4";
    $result = $conexiune->query($sql);

    // Afișează fiecare produs
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="childprods">
            <a href="product_details.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['img']; ?>"></a>
            <h4><?php echo $row['name']; ?></h4>
            <div class="rating">
                <?php
                // Afișează stelele în funcție de valoarea coloanei 'rating'
                for ($i = 1; $i <= 6; $i++) {
                    if ($i <= $row['rating']) {
                        echo '<i class="fa fa-star"></i>';
                    } else {
                        echo '<i class="fa fa-star-o"></i>';
                    }
                }
                ?>
            </div>
            <p><?php echo $row['price']; ?> Lei</p>
        </div>
    <?php
    }

    // Închide conexiunea la bază de date
    $conexiune->close();
    ?>


    <div class="more">
        <a href="products.html">Toate Produsele</a>
    </div>
</div>

        </div>
        
        <div class="testimonial">
            <div class="small-container">
                <h3><i class="fa fa-quote-left"></i> &emsp;Feedback din partea clientilor -</h3>
                <div class="child">
                    <div class="testchild">
                        <p>Foarte Bine 11/10.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="../images/testimonials/jemma.jpg">
                        <h3>Jemma Stone</h3>
                    </div>
                    <div class="testchild">
                        <p>Astai Puma da nu RITA</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="../images/testimonials/rachel.jpg">
                        <h3>Rachel Myers</h3>
                    </div>
                    <div class="testchild">
                        <p>Excelent</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <img src="../images/testimonials/anne.jpg">
                        <h3>Anne Jordan</h3>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once("particles/footer.php") ?>
        <script src="../src/js/script.js"></script>
    </body>
</html>