<?php
session_start();
require_once '../Models/database.php';

if (!isset($_POST['id'], $_POST['content'], $_POST['user_post_id'])) {
    die("Neplatná data.");
}

$commentId = (int)$_POST['id'];
$userPostId = (int)$_POST['user_post_id'];
$content = trim($_POST['content']);

try {
    $pdo = (new Database())->getConnection();

    // Zjisti vlastníka komentáře
    $stmt = $pdo->prepare("SELECT user_id FROM user_post_comments WHERE id = ?");
    $stmt->execute([$commentId]);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$comment) {
        die("Komentář nebyl nalezen.");
    }

    if ($_SESSION['user_id'] != $comment['user_id'] && $_SESSION['role'] !== 'admin') {
        die("Nemáte oprávnění upravit tento komentář.");
    }

    // Aktualizace obsahu
    $stmt = $pdo->prepare("UPDATE user_post_comments SET content = ? WHERE id = ?");
    $stmt->execute([$content, $commentId]);

    header("Location: ../Views/post/user_post_detail.php?id=$userPostId");
    exit();

} catch (PDOException $e) {
    die("Chyba databáze: " . $e->getMessage());
}
