<!-- Komentáře -->
<section class="mt-5">
    <div class="card bg-light">
        <div class="card-body">

            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Formulář pro přidání nového komentáře (jen pro přihlášené uživatele) -->
                <form method="post" class="mb-4">
                    <textarea class="form-control" name="content" rows="3" placeholder="Napiš komentář..." required></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Odeslat</button>
                </form>
            <?php else: ?>
                <!-- Výzva k přihlášení -->
                <p><a href="../auth/login.php">Přihlas se</a>, abys mohl(a) přidat komentář.</p>
            <?php endif; ?>

            <?php foreach ($comments as $comment): ?>
                <!-- Výpis jednoho komentáře -->
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <!-- Profilový obrázek -->
                        <img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="profil" />
                    </div>
                    <div class="ms-3">
                        <!-- Uživatelské jméno -->
                        <div class="fw-bold"><?= htmlspecialchars($comment['username']) ?></div>

                        <!-- Obsah komentáře-->
                        <?= nl2br(htmlspecialchars($comment['content'])) ?>

                        <!-- Čas vytvoření komentáře -->
                        <div class="text-muted small"><?= $comment['created_at'] ?></div>

                        <?php if (
                            isset($_SESSION['user_id']) &&
                            ($_SESSION['user_id'] == $comment['user_id'] || $_SESSION['role'] === 'admin')
                        ): ?>
                            <!-- Tlačítka pro úpravu a smazání -->
                            <div class="mt-2">
                                <a href="edit_comment.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-outline-primary">Upravit</a>

                                <!-- smazání komentáře -->
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