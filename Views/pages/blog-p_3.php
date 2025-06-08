<?php
session_start();
require_once '../../Controllers/commentController.php';

$post_id = 3;
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
                                <h1 class="fw-bolder mb-1">Životní prostředí</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Duben 23, 2025</div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light" href="blog-home.html">Chytrá města</a>
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="https://media.licdn.com/dms/image/D4E12AQGN7fZ9Km3ktQ/article-cover_image-shrink_720_1280/0/1708669549992?e=2147483647&v=beta&t=TK7_hp_ueBp54STMSmE95zgB5-abNXnozEVjOTtFSro" alt="Climate Change and Smart City Solutions: Technologies for Urban Resilience. Online. In: Linkedin.com. 2024. Dostupné z: https://www.linkedin.com/pulse/climate-change-smart-city-solutions-technologies-urban-bhoda-zhwne. [cit. 2024-10-19]." style="width: 850px; height: 450px;" /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4">Zdravé životní prostředí je základem udržitelného i chytrého města. Snižování environmentální zátěže je na prvním místě v péči o životní prostředí.</p>
                                <p class="fs-5 mb-4">Základní udržitelnost je třeba zajistit tím, že budeme co nejšetrněji a nejefektivněji používat všechny zdroje materiálů a energie, které pro svůj život potřebujeme. Současně je třeba významně omezovat závislost klíčových oblastí jako je doprava, energetika, bydlení a potravinový systém na fosilních palivech. </p>
                                <p class="fs-5 mb-4">Řešením jsou inovace, které umožní stejné nebo lepší služby při snižování environmentální zátěže a zvýšení kvality života. Ke sledování, zda k tomu skutečně došlo, slouží inovované indikátory, které umožní srovnání environmentální výkonnosti pro lepší rozhodování při řízení města (např. automatizovaný monitoring). </p>

                                <h2 class="fw-bolder mb-4 mt-5">Smart zavlažování a regulace vlhkosti prostředí </h2>
                                <p class="fs-5 mb-4">S rostoucími teplotami ve městech zcela jistě bude nutné řešit jejich ochlazování větším podílem zeleně v ulicích a náměstích. </p>
                                <p class="fs-5 mb-4">Vzhledem k předpokládaným budoucím rostoucím problémům vodou (její množství a cena) se rozhodně ve velké míře bude muset realizovat efektivní automatické zavlažování veřejné zeleně. </p>
                                <p class="fs-5 mb-4">Využití moderní IoT technologie snadného bezdrátového měření a řízení (ovládání) umožňuje již poměrně snadno realizovat distribuované a přesně řízené lokální zavlažování půdy v závislosti na roční době, předpovědi počasí, umístění a natočení na určitou světovou stranu, lokální teploty a větrnosti, či doby přímého slunečního záření (osvětlení / zastínění). </p>

                                <h2 class="fw-bolder mb-4 mt-5">Smart pěstování a údržba zeleně </h2>
                                <p class="fs-5 mb-4">Veřejná zeleň nepotřebuje jen zavlažování, ale také pravidelnou kontrolu a kultivaci. Vhodný přístup spočívá v sečení ne v předem daných termínech v roce, ale k tomu úkonu přistupovat operativně podle výšky rostliny a budoucího množství očekávaných srážek. </p>
                                <p class="fs-5 mb-4">Blockchain systém pak umožňuje sledovat plodiny po dobu celého růstu. Umělou inteligenci a robotizaci lze velmi dobře použít k interpretaci obrazů v terénu a aplikaci hnojiv a pesticidů s chirurgickou přesností nebo k řešení plevelů. </p>
                                <p class="fs-5 mb-4"> V tomto směru mohou velmi dobrou službu provádět kamerové systémy s funkcí automatického objektového obrazového rozboru, tzv. OBIA (Object-Based Image Analysis), ať již napevno připevněné a trvale monitorující danou plochu nebo prostředí (například v parcích) nebo pohyblivé kamerové systémy například na dronech, které provedou nasnímání dané oblasti například jednou či dvakrát za měsíc. </p>

                                <h2 class="fw-bolder mb-4 mt-5">Zelené domy</h2>
                                <p class="fs-5 mb-4">Poslední roky se v různých médiích hodně probírá téma tzv. zelených domů. </p>
                                <p class="fs-5 mb-4">V případě měst to jsou obvykle projekty přizpůsobení domů pro možnost jejich "osázení" rostlinami, což by mělo současně snižovat teplotu měst a potřebu klimatizování místností domů během horkých měsíců léta, zároveň provádět přídavnou izolaci domů pro snížení nutnosti vytápění v zimě.</p>
                                <p class="fs-5 mb-4">Také pomáhat čistit ovzduší od prachu a CO2 z městské dopravy a navíc zlepšovat psychický stav obyvatel města, protože zeleň a zelená barva působí na lidi obvykle uklidňujícím / relaxačním dojmem</p>
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