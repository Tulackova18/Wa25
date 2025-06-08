<?php
session_start();
require_once '../Models/database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Views/auth/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //odeslání dat 
    $userId = $_SESSION['user_id'];
    $postId = $_POST['post_id'] ?? null;
    $content = trim($_POST['content'] ?? '');

    // Ověření vstupu, že post existuje 
    if (!$postId || !is_numeric($postId) || empty($content)) {
        die("Neplatné nebo neúplné údaje.");
    }

    try {
        $pdo = (new Database())->getConnection();

        $stmt = $pdo->prepare("INSERT INTO user_post_comments (user_post_id, user_id, content) VALUES (?, ?, ?)");
        $stmt->execute([$postId, $userId, $content]);

        header("Location: ../Views/post/user_post_detail.php?id=" . $postId);
        exit();
    } catch (PDOException $e) {
        die("Chyba při ukládání komentáře: " . $e->getMessage());
    }
} else {
    header('Location: ../Views/pages/index.php');
    exit();
}
