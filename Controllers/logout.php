<?php
session_start(); // Spustí session, aby bylo možné ji ukončit

session_unset(); // Odstraní všechny proměnné ze session

session_destroy(); // Zničí samotnou session (soubor se session ID)

header("Location: ../Views/pages/index.php");
exit();
