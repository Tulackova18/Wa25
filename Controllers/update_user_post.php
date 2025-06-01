<?php
session_start();
require_once '../Models/database.php';

// Ověření oprávnění
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../Views/pages/index.php");
    exit();
}

// Připojení k DB
$pdo = (new Database())->getConnection();

// Získání a validace dat
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

if ($id <= 0 || empty($title) || empty($content)) {
    die("Neplatná data.");
}

// Načtení původního obrázku
$stmt = $pdo->prepare("SELECT image_path FROM user_posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$post) {
    die("Příspěvek nenalezen.");
}
$imagePath = $post['image_path'];

// Zpracování nového obrázku (pokud je přidán)
if (!empty($_FILES['image']['name'])) {
    $uploadDir = '../uploads/';
    $newImageName = uniqid() . '_' . basename($_FILES['image']['name']);
    $uploadFile = $uploadDir . $newImageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $imagePath = $newImageName;
    } else {
        die("Chyba při nahrávání obrázku.");
    }
}

// Aktualizace v databázi
$stmt = $pdo->prepare("UPDATE user_posts SET title = ?, content = ?, image_path = ? WHERE id = ?");
$stmt->execute([$title, $content, $imagePath, $id]);

header("Location: ../Views/post/user_post_detail.php?id=" . $id);
exit();
