<?php
session_start();
require_once '../Models/database.php';

// Kontrola, zda byl formulář odeslán metodou POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Načtení a očištění dat z formuláře
    $postId = $_POST['id'] ?? null;
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    // Kontrola, že všechna pole byla vyplněna
    if (!$postId || !$title || !$content) {
        die("Neplatný požadavek.");
    }

    $pdo = (new Database())->getConnection();

    // Kontrola práv
    $stmt = $pdo->prepare("SELECT user_id FROM user_posts WHERE id = ?");
    $stmt->execute([$postId]);
    $post = $stmt->fetch();

    if (!$post || ($_SESSION['user_id'] != $post['user_id'] && $_SESSION['role'] !== 'admin')) {
        die("Nemáte oprávnění.");
    }

    // Aktualizace
    $stmt = $pdo->prepare("UPDATE user_posts SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $postId]);

    // Zpracování nového obrázku, pokud byl přiložen
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = basename($_FILES['image']['name']);
        $imagePath = $uploadDir . time() . '_' . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // Uložení cesty k obrázku do databáze
            $stmt = $pdo->prepare("UPDATE user_posts SET image_path = ? WHERE id = ?");
            $stmt->execute([$imagePath, $postId]);
        } else {
            echo "Nepodařilo se nahrát obrázek.";
        }
    }


    header("Location: ../Views/post/user_post.php?id=$postId");
    exit;
}
