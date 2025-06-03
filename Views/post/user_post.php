<?php
session_start();
require_once '../../Models/database.php';

try {
    $pdo = (new Database())->getConnection();

    // Získání všech článků uživatelů
    $stmt = $pdo->query("SELECT p.id, p.title, p.content, p.image_path, p.created_at, u.username
                          FROM user_posts p
                          JOIN blog_users u ON p.user_id = u.id
                          ORDER BY p.created_at DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Chyba databáze: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>Příspěvky uživatelů | UrbanTech Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <?php include 'navbar.php'; ?>


        <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="container px-5 mt-4">
                <div class="border border-1 rounded p-3 bg-white text-center shadow-sm">
                    <p class="mb-0">
                        <a href="../auth/login.php" class="text-decoration-none fw-semibold">Přihlaste se</a> a sdílejte své příspěvky s komunitou!
                    </p>
                </div>
            </div>
        <?php endif; ?>

        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container px-5">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Příspěvky našich uživatelů</h1>
                    <p class="lead mb-0">Prozkoumejte, co čtenáři sami přidali</p>
                </div>
            </div>
        </header>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <div class="container px-5 mb-4 text-end">
                <a href="user_list.php" class="btn btn-outline-secondary">Správa uživatelů</a>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="container px-5 mb-4 text-end">
                <a href="create_user_post.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Přidej článek
                </a>
            </div>
        <?php endif; ?>


        <section class="py-5">
            <div class="container px-5">
                <div class="row gx-5">
                    <?php foreach ($posts as $post): ?>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <?php if (!empty($post['image_path'])): ?>
                                    <img class="card-img-top" src="../../uploads/<?= htmlspecialchars($post['image_path']) ?>" alt="Obrázek příspěvku"
                                        style="height: 250px; width: 100%; object-fit: cover;">
                                <?php endif; ?>

                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Uživatel</div>

                                    <!-- Název článku bez stretched-link -->
                                    <h5 class="card-title mb-3">
                                        <a class="text-decoration-none link-dark" href="user_post_detail.php?id=<?= $post['id'] ?>">
                                            <?= htmlspecialchars($post['title']) ?>
                                        </a>
                                    </h5>

                                    <p class="card-text mb-3"><?= htmlspecialchars(mb_strimwidth($post['content'], 0, 100, '...')) ?></p>

                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                        <div class="d-flex gap-2">
                                            <a href="edit_user_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-outline-primary">Upravit</a>
                                            <form action="../../Controllers/delete_user_post.php" method="post" onsubmit="return confirm('Opravdu chcete příspěvek smazat?');">
                                                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Smazat</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>


                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="avatar" />
                                            <div class="small">
                                                <div class="fw-bold"><?= htmlspecialchars($post['username']) ?></div>
                                                <div class="text-muted"><?= date('j. n. Y', strtotime($post['created_at'])) ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>