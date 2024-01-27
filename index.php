<?php
// Începe sesiunea PHP (dacă nu a fost începută deja)
session_start();

// Verifică dacă cererea este de tip POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Placeholder pentru detaliile de conexiune la baza de date
    include 'conexiune.php';

    // Verifică conexiunea
    if ($conexiune->connect_error) {
        die("Conexiune esuată: " . $conexiune->connect_error);
    }

    // Obține input-ul utilizatorului
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Validează input-ul utilizatorului
    $email = mysqli_real_escape_string($conexiune, $email);

    // Interogare pentru a verifica dacă utilizatorul există
    $sql = "SELECT * FROM `accounts` WHERE `email` = '$email'";
    $result = $conexiune->query($sql);

    if ($result->num_rows > 0) {
        // Utilizatorul există, verifică parola
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Parola este corectă, salvează informațiile utilizatorului în sesiune
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['admin'] = $row['admin'];

            // Redirecționează către /igor/ro/index.php
            header("Location: /igor/ro/index.php");
            exit(); // Asigură-te că se iese după apelul header
        } else {
            // Parolă incorectă
            echo "Nume de utilizator sau parolă invalidă!";
        }
    } else {
        // Utilizatorul nu există
        echo "Nume de utilizator sau parolă invalidă!";
    }

    // Închide conexiunea la baza de date
    $conexiune->close();
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>CodePen - Animated Login Form using Html & CSS Only</title> 
    <link rel="stylesheet" href="/igor/src/css/log.css"> 
</head> 
<body>
    <section> 
    <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span><span></span> <span></span> <span></span> <span></span>
        <div class="signin">
            <div class="content">
                <h2>Sign In</h2>
                <form action="" method="POST">
                    <div class="form">
                        <div class="inputBox" style='margin:15px 0;'>
                            <input type="text" name="username" required>
                            <i>Username</i>
                        </div>
                        <div class="inputBox" style='margin:15px 0;'>
                            <input type="password" name="password" required>
                            <i>Password</i>
                        </div>
                        <div class="links" style='margin:15px 0;'>
                            <a href="#">Forgot Password</a>
                            <a href="index2.php">Signup</a>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
