<?php
session_start();
require_once '../Models/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = $_POST['id'] ?? null;
    $post_id = $_POST['post_id'] ?? null;
    $new_content = trim($_POST['content'] ?? '');
    $redirect_to = $_POST['redirect_to'] ?? "../Views/pages/blog-p_$post_id.php";

    // Ověření potřebných proměnných (prázdná nebo neexistuje)
    if (!$comment_id || !$new_content || !$post_id) {
        echo "Neplatný požadavek.";
        exit;
    }

    $pdo = (new Database())->getConnection();

    // Získání původního komentáře kvůli kontrole práv
    $stmt = $pdo->prepare("SELECT user_id FROM blog_comments WHERE id = ?");
    $stmt->execute([$comment_id]);
    $comment = $stmt->fetch();

    if (!$comment) {
        echo "Komentář nenalezen.";
        exit;
    }

    if ($_SESSION['user_id'] !== $comment['user_id'] && $_SESSION['role'] !== 'admin') {
        echo "Nemáte oprávnění upravit tento komentář.";
        exit;
    }

    $stmt = $pdo->prepare("UPDATE blog_comments SET content = ? WHERE id = ?");
    $stmt->execute([$new_content, $comment_id]);

    // Přesměrování zpět
    header("Location: $redirect_to");
    exit;
} else {
    echo "Neplatná metoda.";
}
