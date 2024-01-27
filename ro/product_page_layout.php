<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name']; ?></title>
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/svg+xml" href="../images/header/favicon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body class="ohhh" style="background-image: url(../images/header/headerprod.jpg);">
    <?php include_once("particles/header.php") ?>
    <div class="small-container single-product">
        <div class="child">
            <div class="halfchild">
                <img src="<?php echo $row['img']; ?>" width="550px" height="500px" id="prodImg"><br><br><br>
            </div>
            <div class="halfchild">
                <p>Acasa / Produse</p>
                <h1 id="item-name"><?php echo $row['name']; ?></h1>
                <h4><span id="item-price"><?php echo $row['price']; ?></span>Lei</h4>
                <select id="size">
                    <option disabled selected>Selectati Marimea</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>L</option>
                    <option>M</option>
                    <option>S</option>
                </select>
                <input id="count" type="number" min="1" value="1">
                <a href="" class="btn" id="add-to-cart">Cumpara</a>
                <h3>Detalii <i class="fa fa-indent"></i></h3>
                <br>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate culpa accusamus nam libero, quia voluptate quasi omnis sequi accusantium quidem quos autem perspiciatis earum ullam recusandae quas! Atque, non reiciendis.
                </p>
            </div>
        </div>
    </div>
    <?php include_once("particles/footer.php") ?>
    <script src="../src/js/script.js"></script>
</body>
</html>
