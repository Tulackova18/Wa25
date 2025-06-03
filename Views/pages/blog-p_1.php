<?php
session_start();
require_once '../../Controllers/commentController.php';

$post_id = 1;
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

        <!-- Navigation -->
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
                                <h1 class="fw-bolder mb-1">Co je to Smart City?</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Leden 1, 2023</div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light" href="blog.php">Chytrá města</a>
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="https://julienflorkin.com/wp-content/uploads/2023/08/Smart-Cities-25.webp" alt="Chytrá města: 7 zajímavých kapitol o udržitelných a inkluzivních městských prostorech. Online. In: Julienflorkin.com. Dostupné z: https://julienflorkin.com/cs/technika/inteligentn%C3%AD-m%C4%9Bsta/inteligentn%C3%AD-m%C4%9Bsta/. [cit. 2024-10-19]." style="width: 850px; height: 450px;" /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4">Chytré město je městská oblast, kde technologie a sběr dat pomáhají zlepšovat kvalitu života i udržitelnost a efektivitu provozu města. Mezi technologie chytrých měst, patří informační a komunikační technologie (ICT) a internet věcí (IoT).</p>
                                <p class="fs-5 mb-4">Mezi oblasti provozu měst patří doprava, energetika a infrastruktura. Když město aktualizuje své systémy a struktury tak, aby zahrnovaly tyto technologie, stává se chytřejším. </p>

                                <h2 class="fw-bolder mb-4 mt-5">Porozumění a výhody chytrých měst</h2>
                                <p class="fs-5 mb-4">Stejně jako nervový systém těla řídí, jak lidé reagují na svět kolem sebe, vyvíjející se technologie umožňují městům reagovat na změny v místním městském prostředí. </p>
                                <p class="fs-5 mb-4">Technologie pro sběr dat (včetně dat v reálném čase) jsou klíčové pro iniciativy chytrých měst a výhody, které slibují. Poznatky založené na datech pomáhají místním samosprávám zlepšovat územní plánování a zavádění městských služeb, od nakládání s odpady až po veřejnou dopravu, což vede k lepší kvalitě života obyvatel.</p>
                                <p class="fs-5 mb-4">Účinnější městské služby mohou také pomoci snížit emise uhlíku, přispět k celosvětovému úsilí o řešení změny klimatu a zároveň zlepšit místní kvalitu ovzduší. Kromě toho mohou být řešení pro chytrá města motorem hospodářského růstu, protože lepší infrastruktura a technologické inovace mohou podpořit vytváření pracovních míst a obchodních příležitostí.</p>

                                <h2 class="fw-bolder mb-4 mt-5">Evoluce chytrých měst</h2>
                                <p class="fs-5 mb-4">Snahy o zlepšení městského prostředí založené na technologiích a datech se datují přinejmenším od 60. let 20. století, kdy vládní úředníci v Los Angeles v Kalifornii shromažďovali data a používali počítačové programy k identifikaci chudých čtvrtí, které potřebovaly intervenci.</p>
                                <p class="fs-5 mb-4">Pojem "Smart City" se začal objevovat v akademické literatuře v 90. letech 20. století a jeho definice se v průběhu let vyvíjela a rozšiřovala.</p>
                                <p class="fs-5 mb-4">Zpráva McKinsey Global Institute z roku 2018 uvádí, že zatímco městští úředníci kdysi využívali technologie chytrých měst "v zákulisí", řešení chytrých měst nyní stále více zahrnují zapojení obyvatel města. Tyto zúčastněné strany mohou shromažďovat a sdílet důležitá data prostřednictvím digitálních platforem a interaktivních mobilních aplikací, které hrají klíčovou roli v ekosystému chytrých měst. </p>
                                <p class="fs-5 mb-4">Dnes jsou řešení pro chytrá města často nabízena jako pomoc městským oblastem při řešení problémů souvisejících s růstem populace. Organizace spojených národů předpovídá, že do roku 2050 budou dvě třetiny světové populace žít ve městech.</p>
                            </section>
                        </article>


                        <!-- Komentare-->
                        <?php include 'komentare.php'; ?>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- Footer-->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>