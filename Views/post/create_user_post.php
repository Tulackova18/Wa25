<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Views/auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8" />
  <title>Přidat článek | UrbanTech Blog</title>
  <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/styles.css" />
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">

  <?php include 'navbar.php'; ?>

  <section class="py-5">
    <div class="container px-5">
      <h1 class="fw-bold mb-4">Vytvořit nový článek</h1>
      <form action="../Controllers/store_user_post.php" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3">
        <div>
          <label for="title" class="form-label">Nadpis článku</label>
          <input type="text" class="form-control" id="title" name="title" required />
        </div>

        <div>
          <label for="content" class="form-label">Obsah článku</label>
          <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
        </div>

        <div>
          <label for="image" class="form-label">Obrázek (volitelný)</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/*" />
        </div>

        <button type="submit" class="btn btn-primary mt-3">Publikovat</button>
      </form>
    </div>
  </section>

</main>
<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
