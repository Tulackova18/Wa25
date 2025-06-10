<?php
session_start();
require_once '../Models/database.php';

// Zkontroluj, zda je uživatel přihlášen
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Views/auth/login.php");
    exit();
}

// Připojení k databázi
$db = new Database();
$pdo = $db->getConnection();

// Získání hodnot z formuláře
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$user_id = $_SESSION['user_id'];

// Validace
if (empty($title) || empty($content)) {
    echo "Nadpis a obsah jsou povinné.";
    exit();
}

// Zpracování obrázku (pokud byl nahrán)
$imagePath = null;

if (!empty($_FILES['image']['name'])) { //Kontrola, jestli byl opravdu nahrán img
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) { //slozka neexistuje 
        mkdir($uploadDir, 0777, true);
    }

    $imageName = basename($_FILES['image']['name']); //Získá pouze název souboru bez cesty
    $imagePath = $uploadDir . time() . '_' . $imageName; // Vytváří unikátní název souboru

    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath); //Přesune soubor z dočasného umístění (tmp_name) do složky uploads  
}

// Vložení článku do DB
try {
    $stmt = $pdo->prepare("INSERT INTO user_posts (user_id, title, content, image_path, created_at)
                           VALUES (:user_id, :title, :content, :image, NOW())");

    $stmt->execute([
        ':user_id' => $user_id,
        ':title' => $title,
        ':content' => $content,
        ':image' => $imagePath
    ]);

    header("Location: ../Views/post/user_post.php");
    exit();
} catch (PDOException $e) {
    echo "Chyba při ukládání článku: " . $e->getMessage();
}
