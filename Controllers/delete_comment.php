
<?php
session_start();
require_once '../Models/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Views/auth/login.php");
    exit();
}

if (!isset($_POST['comment_id']) || !is_numeric($_POST['comment_id'])) {
    die("Neplatné ID komentáře.");
}

$commentId = (int)$_POST['comment_id'];

try {
    $pdo = (new Database())->getConnection();

    // Zjisti vlastníka komentáře
    $stmt = $pdo->prepare("SELECT user_id FROM blog_comments WHERE id = ?");
    $stmt->execute([$commentId]);
    $comment = $stmt->fetch();

    if (!$comment) {
        die("Komentář nebyl nalezen.");
    }

    // Ověření práv
    if ($_SESSION['user_id'] != $comment['user_id'] && $_SESSION['role'] !== 'admin') {
        die("Nemáte oprávnění smazat tento komentář.");
    }

    // Smazání
    $stmt = $pdo->prepare("DELETE FROM blog_comments WHERE id = ?");
    $stmt->execute([$commentId]);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} catch (PDOException $e) {
    die("Chyba: " . $e->getMessage());
}
?>

