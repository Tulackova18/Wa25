<?php
session_start();
require_once '../Models/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['id'] ?? null;
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

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

    header("Location: ../Views/post/user_post.php?id=$postId");
    exit;
}
