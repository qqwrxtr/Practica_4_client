<?php
// Începe sesiunea PHP (dacă nu a fost începută încă)
session_start();

// Placeholder pentru detaliile de conexiune la baza de date
include 'conexiune.php';

// Funcție pentru a redirecționa către pagina anterioară
function redirectToPreviousPage() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // Redirecționează către o pagină implicită dacă nu există o pagină anterioară disponibilă
        header("Location: ../index.php");
        exit();
    }
    exit();
}

// Verifică dacă utilizatorul este autentificat
if (isset($_SESSION['user_id'])) {
    // Utilizatorul este autentificat
    $userId = $_SESSION['user_id'];

    // Preia numele utilizatorului din baza de date
    $sql = "SELECT name FROM accounts WHERE id = $userId";
    $result = $conexiune->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userName = $row['name'];
        $welcomeMessage = "Bun venit, $userName!";
    } else {
        // Mesaj de bun venit implicit dacă numele nu este disponibil
        $welcomeMessage = "Bun venit, Utilizator!";
    }
} else {
    // Redirecționează către pagina de autentificare dacă utilizatorul nu este autentificat
    header("Location: /igor/login.php");
    exit();
}

// Închide conexiunea la baza de date
$conexiune->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina contului</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            margin: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2><?php echo $welcomeMessage; ?></h2>

    <!-- Buton de logout -->
    <form action="/igor/logout.php" method="post">
        <button type="submit">Logout</button>
    </form>

    <!-- Buton pentru a reveni înapoi -->
    <button onclick="goBack()">Înapoi</button>

    <script>
        // Funcție JavaScript pentru a reveni la pagina anterioară
        function goBack() {
            window.history.back();
        }
    </script>
</div>

</body>
</html>
