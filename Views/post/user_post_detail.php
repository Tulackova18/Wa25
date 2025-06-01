<?php
session_start();
require_once '../../Models/database.php';

// Připojení k databázi
$pdo = (new Database())->getConnection();

// Získání ID příspěvku z URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Neplatné ID příspěvku.');
}
$postId = (int) $_GET['id'];

// Načtení příspěvku z DB
$stmt = $pdo->prepare("SELECT p.*, u.username FROM user_posts p JOIN blog_users u ON p.user_id = u.id WHERE p.id = ?");
$stmt->execute([$postId]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die('Příspěvek nebyl nalezen.');
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?> | UrbanTech Blog</title>
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">
    <?php include 'navbar.php'; ?>

    <header class="py-4 bg-light border-bottom mb-3">
        <div class="container px-5">
            <div class="text-center">
                <h1 class="fw-bolder fs-2 mb-2"><?= htmlspecialchars($post['title']) ?></h1>
                <p class="lead mb-0">Autor: <?= htmlspecialchars($post['username']) ?> | <?= date('j. n. Y', strtotime($post['created_at'])) ?></p>
            </div>
        </div>
    </header>

    <section class="pb-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <?php if ($post['image_path']): ?>
                        <img src="../../uploads/<?= htmlspecialchars($post['image_path']) ?>" 
                            alt="Obrázek" 
                            class="img-fluid rounded mb-4" 
                            style="height: 450px; width: 100%; object-fit: cover;">
                    <?php endif; ?>

                    <p class="fs-5"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <div class="mt-4 d-flex gap-3">
                            <a href="edit_user_post.php?id=<?= $post['id'] ?>" class="btn btn-primary">Upravit</a>
                            <form method="post" action="../Controllers/delete_user_post.php" onsubmit="return confirm('Opravdu chceš smazat tento příspěvek?');">
                                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                <button type="submit" class="btn btn-danger">Smazat</button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <a href="user_post.php" class="btn btn-secondary mt-4">Zpět na fórum</a>

                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
