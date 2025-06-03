<?php
session_start();
require_once '../../Models/database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Neplatné ID komentáře.");
}

$commentId = (int)$_GET['id'];

try {
    $pdo = (new Database())->getConnection();

    // Načti komentář + ověř vlastnictví
    $stmt = $pdo->prepare("SELECT c.*, u.username FROM user_post_comments c
                           JOIN blog_users u ON c.user_id = u.id
                           WHERE c.id = ?");
    $stmt->execute([$commentId]);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$comment) {
        die("Komentář nebyl nalezen.");
    }

    // Ověření práv – může upravit autor komentáře nebo admin
    if (
        !isset($_SESSION['user_id']) ||
        ($_SESSION['user_id'] != $comment['user_id'] && $_SESSION['role'] !== 'admin')
    ) {
        die("Nemáte oprávnění upravit tento komentář.");
    }
} catch (PDOException $e) {
    die("Chyba: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>Úprava komentáře</title>
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <?php include 'navbar.php'; ?>

        <div class="container py-5">
            <h2>Upravit komentář</h2>

            <form action="../../Controllers/update_user_post_comment.php" method="post">
                <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                <input type="hidden" name="user_post_id" value="<?= $comment['user_post_id'] ?>">

                <div class="mb-3">
                    <label for="content" class="form-label">Obsah komentáře:</label>
                    <textarea name="content" id="content" rows="4" class="form-control" required><?= htmlspecialchars($comment['content']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Uložit změny</button>
                <a href="user_post_detail.php?id=<?= $comment['user_post_id'] ?>" class="btn btn-secondary ms-2">Zpět</a>
            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>