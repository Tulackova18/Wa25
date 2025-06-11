<?php
session_start();
require_once '../../Models/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../Views/pages/index.php');
    exit();
}

try {
    $pdo = (new Database())->getConnection();
    $stmt = $pdo->query("SELECT id, username, email, role, created_at FROM blog_users ORDER BY created_at DESC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Chyba databáze: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>Seznam uživatelů | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <?php include 'navbar.php'; ?>

        <section class="py-5">
            <div class="container px-5">
                <h2 class="mb-4">Seznam uživatelů</h2>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Uživatelské jméno</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Vytvořeno</th>
                            <th>Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= htmlspecialchars($user['role']) ?></td>
                                <td><?= date('j. n. Y', strtotime($user['created_at'])) ?></td>
                                <td>
                                    <?php if ($_SESSION['user_id'] != $user['id']): ?>
                                        <form method="post" action="../../Controllers/delete_user.php" onsubmit="return confirm('Opravdu chcete smazat tohoto uživatele?');">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger">Smazat</button>
                                        </form>
                                    <?php else: ?>
                                        <span class="text-muted small">Nelze smazat sebe</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php include '../pages/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>