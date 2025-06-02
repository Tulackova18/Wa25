<?php
session_start();
require_once '../Models/database.php';

// Kontrola přihlášení
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Views/auth/login.php");
    exit();
}

// Kontrola ID
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("Neplatné ID.");
}

$id = (int)$_POST['id'];
$userId = $_SESSION['user_id'];
$userRole = $_SESSION['role'];
$pdo = (new Database())->getConnection();

// Načtení příspěvku (kvůli kontrole vlastnictví + smazání obrázku)
$stmt = $pdo->prepare("SELECT user_id, image_path FROM user_posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die("Příspěvek nebyl nalezen.");
}

// ✅ Kontrola oprávnění: může mazat admin nebo vlastník
if ($userRole !== 'admin' && $post['user_id'] != $userId) {
    die("Nemáte oprávnění smazat tento příspěvek.");
}

// Smazání obrázku ze serveru (pokud existuje)
if (!empty($post['image_path'])) {
    $imageFile = '../uploads/' . $post['image_path'];
    if (file_exists($imageFile)) {
        unlink($imageFile);
    }
}

// Smazání příspěvku z databáze
$stmt = $pdo->prepare("DELETE FROM user_posts WHERE id = ?");
$stmt->execute([$id]);

// Přesměrování zpět
header("Location: ../Views/post/user_post.php");
exit();
