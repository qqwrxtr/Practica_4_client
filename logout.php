<?php
// Începe sesiunea PHP (dacă nu a fost începută încă)
session_start();

// Distrugerea sesiunii
session_destroy();

// Redirecționează către pagina principală sau pagina de autentificare
header("Location: index.php");
exit();
?>
