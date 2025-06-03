<!-- Komentáře -->
<section class="mt-5">
    <div class="card bg-light">
        <div class="card-body">
            <?php if (isset($_SESSION['user_id'])): ?>
                <form method="post" class="mb-4">
                    <textarea class="form-control" name="content" rows="3" placeholder="Napiš komentář..." required></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Odeslat</button>
                </form>
            <?php else: ?>
                <p><a href="../auth/login.php">Přihlas se</a>, abys mohl(a) přidat komentář.</p>
            <?php endif; ?>

            <?php foreach ($comments as $comment): ?>
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="profil" />
                    </div>
                    <div class="ms-3">
                        <div class="fw-bold"><?= htmlspecialchars($comment['username']) ?></div>
                        <?= nl2br(htmlspecialchars($comment['content'])) ?>
                        <div class="text-muted small"><?= $comment['created_at'] ?></div>

                        <?php if (
                            isset($_SESSION['user_id']) &&
                            ($_SESSION['user_id'] == $comment['user_id'] || $_SESSION['role'] === 'admin')
                        ): ?>
                            <div class="mt-2">
                                <a href="edit_comment.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-outline-primary">Upravit</a>
                                <form method="post" action="../../Controllers/delete_comment.php" class="d-inline" onsubmit="return confirm('Opravdu chcete smazat tento komentář?');">
                                    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Smazat</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>