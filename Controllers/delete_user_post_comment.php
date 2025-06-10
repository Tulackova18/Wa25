<?php
session_start();
require_once '../Models/database.php';

//Pokud není uživatel přihlášen, přesměruje ho na hlavní stránku webu a ukončí běh skriptu
if (!isset($_SESSION['user_id'])) {
    header('Location: ../Views/pages/index.php');
    exit();
}
//Kontroluje, zda byl poslán comment_id a jestli jde o číslo (kvůli bezpečnosti).
if (!isset($_POST['comment_id']) || !is_numeric($_POST['comment_id'])) {
    die("Neplatné ID komentáře.");
}

$commentId = (int)$_POST['comment_id']; //Získává ID komentáře z formuláře a převádí ho na celé číslo
$postId = isset($_POST['post_id']) ? (int)$_POST['post_id'] : 0; //uloží post_id pokud byl poslán, jinak 0 

try {
    $pdo = (new Database())->getConnection();

    // Zkontroluj oprávnění
    $stmt = $pdo->prepare("SELECT user_id FROM user_post_comments WHERE id = ?");
    $stmt->execute([$commentId]);
    $comment = $stmt->fetch();

    if (!$comment || ($_SESSION['user_id'] != $comment['user_id'] && $_SESSION['role'] !== 'admin')) {
        die("Nemáte oprávnění smazat tento komentář.");
    }


    // Pouze autor komentáře nebo admin může mazat
    if ($_SESSION['user_id'] != $comment['user_id'] && $_SESSION['role'] !== 'admin') {
        die("Nemáte oprávnění ke smazání tohoto komentáře.");
    }

    // Smaž komentář
    $stmt = $pdo->prepare("DELETE FROM user_post_comments WHERE id = ?");
    $stmt->execute([$commentId]);

    // Přesměrování zpět na detail příspěvku
    header("Location: ../Views/post/user_post_detail.php?id=$postId");
    exit();
} catch (PDOException $e) {
    die("Chyba databáze: " . $e->getMessage());
}
