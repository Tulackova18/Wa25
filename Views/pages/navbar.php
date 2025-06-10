<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">
            <img src="../../assets/favicon.ico" style="height: 24px; width: 24px; margin-right: 8px;">
            UrbanTech Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Domů</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">O nás</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="../post/user_post.php">Fórum</a></li>

                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <span class="nav-link text-info">Přihlášen: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                    </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li><a class="dropdown-item" href="../../Controllers/logout.php">Odhlásit se</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="../auth/register.php">Registrace</a></li>
                            <li><a class="dropdown-item" href="../auth/login.php">Přihlášení</a></li>
                        <?php endif; ?>
                    </ul>

                </li>
            </ul>
        </div>
    </div>
</nav>