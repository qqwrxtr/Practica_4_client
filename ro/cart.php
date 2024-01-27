<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="../src/css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/svg+xml" href="../images/header/favicon.svg">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    </head>
    <body>
        <img src="../images/header/headerprod.jpg" style="display: none;">
        <?php include_once("particles/header.php") ?>
        <div class="headerimg">
            <div class="cartBox active" id='cart'>
                <div class="cart">
                  <section class="container_shop content-section" id="cart-display">
                  </section>
                  <a href="" class="btn" id="checkout">Finiseaza</a>
                </div>
              </div>
        </div>
        <?php include_once("particles/footer.php") ?>
        </div>
        <script src="../src/js/script.js"></script>
    </body>
</html>