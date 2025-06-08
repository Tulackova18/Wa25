<?php
session_start();
require_once '../../Controllers/commentController.php';

$post_id = 5;
$controller = new CommentController();
$controller->handleCommentSubmit($post_id);
$comments = $controller->getComments($post_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php include 'navbar.php'; ?>
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center mt-lg-5 mb-4">
                            <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                            <div class="ms-3">
                                <div class="fw-bold">Lenka Tuláčková</div>
                                <div class="text-muted">Novinky,Chytrá města</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">The Line</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Červen 10, 2025</div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light" href="blog.php">Chytrá města</a>
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="https://cdn.lovin.co/wp-content/uploads/sites/28/2024/02/28105056/jean-macedo-4.jpg" alt="Neom’s “The Line” Project Is Getting Closer To Reality. Online. In: Lovin neom. 2024. Dostupné z: https://lovin.co/neom/en/latest/neoms-the-line-project-is-getting-closer-to-reality/. [cit. 2024-10-19]." style="width: 850px; height: 450px;" /></figure>

                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4">The Line je chytré město ve výstavbě v Saúdské Arábii v lineárním tvaru. Je navrženo tak, aby nemělo žádná auta, ulice ani uhlíkové emise . </p>
                                <p class="fs-5 mb-4">Město je jedním z devíti oznámených regionů Neom a je součástí projektu Saudi Vision 2030, o kterém Saúdská Arábie tvrdí, že vytvoří kolem 460,000 pracovních míst. </p>
                                <h2 class="fw-bolder mb-4 mt-5">Návrh města</h2>
                                </p>
                                <p class="fs-5 mb-4">Město bude mít délku 170 kilometrů, která zachová 95 % přírody v Neom. Bude se táhnout od Rudého moře přibližně k městu Tabuk . </p>
                                <p class="fs-5 mb-4">Předpokládá se, že bude mít devět milionů obyvatel, což povede k průměrné hustotě obyvatelstva 260,000 na kilometr čtvereční. Pro srovnání, Manila, nejhustěji osídlené město světa v roce 2020, měla hustotu 44,000 obyvatel na kilometr čtvereční.</p>
                                <p class="fs-5 mb-4">Plán města The Line se skládá ze dvou zrcadlových budov s venkovním prostorem mezi nimi, které mají celkovou šířku 200 metrů a výšku 500 metrů. To by z ní udělalo 3. nejvyšší budovu v zemi, po hodinové věži Abraj Al-Bait a navrhované Jeddah Tower a přibližně 12. nejvyšší budovu na světě.</p>
                                <p class="fs-5 mb-4">Plánem je, že město bude poháněno výhradně obnovitelnými zdroji energie. Bude sestávat ze tří vrstev, jedna na povrchu pro chodce, jedna pod zemí pro infrastrukturu a další pod zemí pro dopravu. </p>
                                <p class="fs-5 mb-4">Umělá inteligence bude město monitorovat a pomocí prediktivních a datových modelů hledat způsoby, jak zlepšit každodenní život jeho občanů, přičemž obyvatelé budou placeni za odesílání dat do The Line. </p>
                                <p class="fs-5 mb-4">Stavba The Line přináší revoluční přístup k městskému plánování a životnímu prostředí, což z ní dělá vzor pro budoucí udržitelná města. Úspěšná realizace tohoto projektu by mohla přinést zásadní změny v životním stylu a urbanistických trendech po celém světě.</p>
                                <h2 class="fw-bolder mb-4 mt-5">Současný stav výstavby</h2>
                                </p>
                                <p class="fs-5 mb-4">S výstavbou tohoto města se začalo v červenci 2022 a dokončení projektu se odhaduje na rok 2030. V současnosti probíhá výstavba základní infrastruktury a technologických komponentů, které mají zajistit futuristické funkce a udržitelnost města.</p>
                            </section>
                        </article>
                        <!-- Komentare-->
                        <?php include 'komentare.php'; ?>

    </main>
    <!-- Footer-->
    <?php include 'footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>