<?php
// Includează fișierul de conexiune la bază de date
include 'conexiune.php';

// Începe sesiunea PHP
session_start();

?>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <!-- Adaugă un link către pagina principală -->
                <a href="index.php"><img src="../images/header/complogo.png" alt="comp" width="225px"></a>
            </div>
            <nav>
                <ul class="nav-menu">
                    <!-- Adaugă link-uri către paginile principale -->
                    <li class="nav-item"><a href="index.php">Acasa</a></li>
                    <li class="nav-item"><a href="products.php">Produse</a></li>
                    <li class="nav-item"><a href="contacts.php">Contacte</a></li>
                    
                    <?php
                    // Verifică dacă utilizatorul este autentificat și este administrator
                    if (isset($_SESSION['user_id']) && isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        // Afișează link-ul pentru panoul de administrare
                        echo '<li class="nav-item"><a href="/igor/admin/template/index.php">Admin Panel</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <!-- Adaugă link-uri către paginile coșului de cumpărături și contului utilizatorului -->
            <a href="cart.php">
                <span class="material-symbols-outlined">
                    shopping_cart
                </span>
            </a>
            <a href="account.php">
                <span class="material-symbols-outlined">
                    person
                </span>
            </a>
            <!-- Adaugă un element de comutare pentru meniul responsiv -->
            <div class="toggle"><i class="fa fa-bars"></i></div>
        </div>
    </div>
</div>
