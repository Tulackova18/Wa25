<?php
session_start();
require_once '../Models/database.php';

//Pokud není uživatel přihlášen nebo není admin, přesměruje ho na hlavní stránku
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../Views/pages/index.php');
    exit();
}
// Ověření, že POST obsahuje platné ID uživatele ve formátu čísla
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("Neplatné ID uživatele.");
}

//Převede id uživatele na celé číslo 
$userId = (int)$_POST['id'];

try {
    $pdo = (new Database())->getConnection();

    // Nejprve smaž komentáře uživatele
    $stmt = $pdo->prepare("DELETE FROM blog_comments WHERE user_id = ?");
    $stmt->execute([$userId]);

    // Poté smaž samotného uživatele
    $stmt = $pdo->prepare("DELETE FROM blog_users WHERE id = ?");
    $stmt->execute([$userId]);

    header("Location: ../Views/post/user_list.php");
    exit();
} catch (PDOException $e) {
    die("Chyba při mazání: " . $e->getMessage());
}
