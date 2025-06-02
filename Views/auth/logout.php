<?php
session_start();

// Zrušíme všechny session proměnné
$_SESSION = [];

// Zničíme session úplně
session_destroy();

// Přesměrování na homepage nebo login
header("Location: ../pages/index.php");
exit();
