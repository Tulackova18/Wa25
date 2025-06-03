<?php
session_start();
require_once '../../Models/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../pages/index.php');
    exit();
}

$pdo = (new Database())->getConnection();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Neplatné ID příspěvku.');
}
$postId = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM user_posts WHERE id = ?");
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
    <title>Úprava příspěvku | UrbanTech Blog</title>
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <?php include 'navbar.php'; ?>

        <header class="py-4 bg-light border-bottom mb-4">
            <div class="container px-5">
                <div class="text-center my-4">
                    <h1 class="fw-bolder">Upravit příspěvek</h1>
                </div>
            </div>
        </header>

        <section class="py-4">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="../../Controllers/update_user_post.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $post['id'] ?>">

                            <div class="mb-3">
                                <label for="title" class="form-label">Název</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?= htmlspecialchars($post['title']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Obsah</label>
                                <textarea class="form-control" name="content" id="content" rows="8" required><?= htmlspecialchars($post['content']) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Změnit obrázek (volitelné)</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <?php if ($post['image_path']): ?>
                                <p>Aktuální obrázek:</p>
                                <img src="../../uploads/<?= htmlspecialchars($post['image_path']) ?>" class="img-fluid mb-3" style="max-height: 200px;">
                            <?php endif; ?>

                            <button type="submit" class="btn btn-primary">Uložit změny</button>
                            <a href="user_post_detail.php?id=<?= $post['id'] ?>" class="btn btn-secondary ms-2">Zpět</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>