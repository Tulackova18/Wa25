<?php
session_start();
require_once '../Models/database.php';

// Kontrola oprávnění
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../Views/pages/index.php");
    exit();
}

// Kontrola ID
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("Neplatné ID.");
}

$id = (int)$_POST['id'];
$pdo = (new Database())->getConnection();

// Načtení obrázku pro případné smazání souboru
$stmt = $pdo->prepare("SELECT image_path FROM user_posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($post && !empty($post['image_path'])) {
    $imageFile = '../uploads/' . $post['image_path'];
    if (file_exists($imageFile)) {
        unlink($imageFile); // smaže obrázek ze serveru
    }
}

// Smazání z databáze
$stmt = $pdo->prepare("DELETE FROM user_posts WHERE id = ?");
$stmt->execute([$id]);

header("Location: ../Views/post/user_post.php");
exit();
