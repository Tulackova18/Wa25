<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="UTF-8">
  <title>Registrace | UrbanTech Blog</title>
  <link rel="icon" type="image/x-icon" href="../../../assets/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/styles.css">
</head>

<body class="d-flex flex-column">
  <main class="flex-shrink-0">

    <!-- Vlastní navigace -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-3">
      <div class="alert alert-light text-center border rounded shadow-sm">
        Máte už účet? <a href="login.php" class="fw-bold text-decoration-none">Přihlaste se</a>.
      </div>
    </div>

    <header class="py-3 bg-light border-bottom mb-4">
      <div class="container px-5">
        <div class="text-center my-2">
          <h1 class="fw-bolder">Vytvoření účtu</h1>
          <p class="lead mb-0">Staň se součástí UrbanTech komunity</p>
        </div>
      </div>
    </header>

    <section class="py-5">
      <div class="container px-5">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-sm rounded-4 border-0">
              <div class="card-body p-5">
                <form id="registrationForm" action="../../Controllers/register.php" method="post" class="d-flex flex-column gap-3">
                  <div>
                    <label for="username" class="form-label">Uživatelské jméno</label>
                    <input type="text" class="form-control rounded-3" id="username" name="username" required>
                  </div>
                  <div>
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control rounded-3" id="email" name="email" required>
                  </div>
                  <div>
                    <label for="password" class="form-label">Heslo</label>
                    <input type="password" class="form-control rounded-3" id="password" name="password"
                      pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                      title="Min. 8 znaků, 1 velké písmeno a 1 číslo" required>
                  </div>
                  <div>
                    <label for="password_confirm" class="form-label">Potvrzení hesla</label>
                    <input type="password" class="form-control rounded-3" id="password_confirm" name="password_confirm" required>
                    <div id="passwordMatchMessage" class="form-text text-danger d-none">Hesla se neshodují.</div>
                  </div>
                  <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary rounded-3">Registrovat se</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



  <script>
    const form = document.getElementById('registrationForm');
    const password = document.getElementById('password');
    const confirm = document.getElementById('password_confirm');
    const message = document.getElementById('passwordMatchMessage');

    form.addEventListener('submit', function(e) { //když se uživatel pokusí odeslat formulář
      if (password.value !== confirm.value) { //Porovná, jestli zadané heslo a potvrzení hesla jsou stejné
        e.preventDefault(); //Pokud nejsou stejná, zabrání odeslání formuláře
        message.classList.remove('d-none'); // Zobrazí chybovou zprávu 
      } else {
        message.classList.add('d-none'); //Pokud hesla souhlasí, skryje chybovou zprávu
      }
    });
  </script>
</body>

</html>