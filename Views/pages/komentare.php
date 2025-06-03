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

                         <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                             <form method="post" action="../../Controllers/delete_comment.php" class="mt-2">
                                 <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                 <button class="btn btn-sm btn-danger">Smazat</button>
                             </form>
                         <?php endif; ?>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>
 </section>