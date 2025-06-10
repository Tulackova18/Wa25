<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="UTF-8">
  <title>Přihlášení | UrbanTech Blog</title>
  <link rel="icon" type="image/x-icon" href="../../../assets/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/styles.css">
</head>

<body class="d-flex flex-column">
  <main class="flex-shrink-0">

    <?php include 'navbar.php'; ?>
    <header class="py-3 bg-light border-bottom mb-4">
      <div class="container px-5">
        <div class="text-center my-2">
          <h1 class="fw-bolder">Přihlášení</h1>
          <p class="lead mb-0">Přihlas se a přidej se k diskuzi o chytrých městech</p>
        </div>
      </div>
    </header>

    <section class="py-5">
      <div class="container px-5">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-sm rounded-4 border-0">
              <div class="card-body p-5">
                <form action="../../Controllers/login.php" method="post" class="d-flex flex-column gap-3">
                  <div>
                    <label for="username" class="form-label">Uživatelské jméno</label>
                    <input type="text" id="username" name="username" class="form-control rounded-3" required>
                  </div>
                  <div>
                    <label for="password" class="form-label">Heslo</label>
                    <input type="password" id="password" name="password" class="form-control rounded-3" required>
                  </div>
                  <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary btn-lg rounded-3">Přihlásit se</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../js/scripts.js"></script>
</body>

</html>