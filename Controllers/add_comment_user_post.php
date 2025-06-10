<?php
session_start(); //uchování informací o přihlášeném uživateli
require_once '../Models/database.php'; // připojení k databázi 

//Ověření, že je uživatel přihlášen
if (!isset($_SESSION['user_id'])) {
    header('Location: ../Views/auth/login.php');
    exit();
}

// Data z formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $postId = $_POST['post_id'] ?? null;
    $content = trim($_POST['content'] ?? '');

    // Ověření vstupu, že post existuje 
    if (!$postId || !is_numeric($postId) || empty($content)) {
        die("Neplatné nebo neúplné údaje.");
    }

    try {
        $pdo = (new Database())->getConnection(); //Připojení k databázi

        // SQL dotaz pro uložení komentáře do tabulky user_post_comments
        $stmt = $pdo->prepare("INSERT INTO user_post_comments (user_post_id, user_id, content) VALUES (?, ?, ?)"); // placeholdery ? pro bezpečnost (ochrana proti SQL injekci)
        $stmt->execute([$postId, $userId, $content]); // execute() vloží reálné hodnoty

        //Po úspěšném vložení přesměruje uživatele zpět na detail příspěvku, ke kterému přidal komentář
        header("Location: ../Views/post/user_post_detail.php?id=" . $postId);
        exit();

        //Pokud nastane chyba při komunikaci s databází, zobrazí chybovou hlášku
    } catch (PDOException $e) {
        die("Chyba při ukládání komentáře: " . $e->getMessage());
    }
    //Pokud formulář nebyl odeslán POSTem, přesměruje uživatele na hlavní stránku webu
} else {
    header('Location: ../Views/pages/index.php');
    exit();
}
