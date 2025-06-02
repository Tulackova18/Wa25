<?php  
session_start();
require_once '../../Models/database.php';
require_once '../../Models/userPostComment.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Neplatné ID příspěvku.");
}

$postId = (int)$_GET['id'];

try {
    $pdo = (new Database())->getConnection();

    // Načti daný příspěvek
    $stmt = $pdo->prepare("SELECT p.*, u.username FROM user_posts p JOIN blog_users u ON p.user_id = u.id WHERE p.id = ?");
    $stmt->execute([$postId]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        die("Příspěvek nebyl nalezen.");
    }

    // Načti komentáře
    $commentModel = new UserPostComment($pdo);
    $comments = $commentModel->getByPostId($postId);
} catch (PDOException $e) {
    die("Chyba: " . $e->getMessage());
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
                            <form method="post" action="../../Controllers/delete_user_post.php" onsubmit="return confirm('Opravdu chceš smazat tento příspěvek?');">
                                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                <button type="submit" class="btn btn-danger">Smazat</button>
                            </form>
                        </div>
                    <?php endif; ?>

                    <!-- Komentáře -->
                    <section class="mt-5">
                        <h4>Komentáře</h4>

                        <?php if (!empty($comments)): ?>
                            <?php foreach ($comments as $comment): ?>
    <div class="border p-3 mb-2 rounded bg-light">
        <p class="mb-1"><?= htmlspecialchars($comment['content']) ?></p>
        <div class="text-muted small">
            <?= htmlspecialchars($comment['username']) ?> | <?= date('j. n. Y H:i', strtotime($comment['created_at'])) ?>
        </div>

        <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $comment['user_id'] || $_SESSION['role'] === 'admin')): ?>
            <div class="mt-2 d-flex gap-2">
                <a href="edit_user_post_comment.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-outline-primary">Upravit</a>
                <form method="post" action="../../Controllers/delete_user_post_comment.php" class="d-inline" onsubmit="return confirm('Opravdu chcete smazat tento komentář?');">
                    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                    <input type="hidden" name="post_id" value="<?= $postId ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Smazat</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

                
                        <?php else: ?>
                            <p class="text-muted">Zatím žádné komentáře.</p>
                        <?php endif; ?>
                    </section>

                    <!-- Formulář pro nový komentář -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <section class="mt-4">
                            <form action="../../Controllers/add_comment_user_post.php" method="post">
                                <input type="hidden" name="post_id" value="<?= $postId ?>">
                                <div class="mb-3">
                                    <label for="commentContent" class="form-label">Váš komentář:</label>
                                    <textarea name="content" id="commentContent" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Přidat komentář</button>
                            </form>
                        </section>
                    <?php else: ?>
                        <p class="mt-4"><a href="../auth/login.php">Přihlaste se</a>, abyste mohli přidat komentář.</p>
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
