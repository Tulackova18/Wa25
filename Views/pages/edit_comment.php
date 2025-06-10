<?php
session_start();
require_once '../../Models/database.php';

//kontroluje platné id komentáře pro jeho úpravu
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Neplatné ID komentáře.");
}

$commentId = (int)$_GET['id']; //Získává id hodnotu z URL

try {
    $pdo = (new Database())->getConnection();

    // Načti komentář
    $stmt = $pdo->prepare("SELECT * FROM blog_comments WHERE id = ?");
    $stmt->execute([$commentId]);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$comment) {
        die("Komentář nebyl nalezen.");
    }

    // Ověření práv
    if (
        !isset($_SESSION['user_id']) ||
        ($_SESSION['user_id'] != $comment['user_id'] && $_SESSION['role'] !== 'admin')
    ) {
        die("Nemáte oprávnění upravit tento komentář.");
    }

    $postId = $comment['post_id'];
    $redirectUrl = $_SERVER['HTTP_REFERER'] ?? "../pages/blog-p_$postId.php";
} catch (PDOException $e) {
    die("Chyba: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>Úprava komentáře</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <?php include 'navbar.php'; ?>

        <div class="container py-5">
            <h2>Upravit komentář</h2>

            <form action="../../Controllers/update_comment.php" method="post"> <!--Spustí formulář, který odešle data metodou POST do souboru update_comment.php-->
                <input type="hidden" name="id" value="<?= $commentId ?>"><!--Skryté pole s ID komentáře, který se má upravit-->
                <input type="hidden" name="post_id" value="<?= $postId ?>"><!--Ukládá ID příspěvku (článku), ke kterému komentář patře-->
                <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($redirectUrl) ?>"><!-- Kam má být uživatel přesměrován po úspěšné úpravě-->

                <div class="mb-3">
                    <label for="content" class="form-label">Obsah komentáře:</label>
                    <textarea name="content" id="content" rows="4" class="form-control" required><?= htmlspecialchars($comment['content']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Uložit změny</button>
                <a href="<?= htmlspecialchars($redirectUrl) ?>" class="btn btn-secondary ms-2">Zpět</a>
            </form>
        </div>
    </main>
</body>

</html>