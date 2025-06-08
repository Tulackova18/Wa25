<?php
session_start();
require_once '../../Controllers/commentController.php';

$post_id = 2;
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <?php include 'navbar.php'; ?>

        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center mt-lg-5 mb-4">
                            <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                            <div class="ms-3">
                                <div class="fw-bold">Lenka Tuláčková</div>
                                <div class="text-muted">Novinky, Chytrá města</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <article>
                            <header class="mb-4">
                                <h1 class="fw-bolder mb-1">Technologie chytrých měst</h1>
                                <div class="text-muted fst-italic mb-2">Březen 12, 2025</div>
                                <a class="badge bg-secondary text-decoration-none link-light" href="blog.php">Chytrá města</a>
                            </header>
                            <figure class="mb-4">
                                <img class="img-fluid rounded" src="https://smart-structures.com/wp-content/uploads/2023/12/1701481408924.png" alt="Obrázek" style="width: 850px; height: 450px;" />
                            </figure>
                            <section class="mb-5">
                                <section class="mb-5">
                                    <p class="fs-5 mb-4">Nové technologie, které zlepšují efektivitu a udržitelnost v soukromém sektoru, jsou také hnací silou sítí chytrých měst:</p>

                                    <h3 class="fw-bolder mb-4 mt-5">Informační a komunikační technologie (ICT)</h3>
                                    <p class="fs-5 mb-4">Informační a komunikační technologie zahrnují řadu technologií souvisejících s daty. Národní institut pro standardy a technologie Ministerstva obchodu USA definuje informační a komunikační technologie jako zachycování, ukládání, vyhledávání, zpracování, zobrazování, reprezentaci, prezentaci, organizaci, správu, zabezpečení, přenos a výměnu dat a informací.</p>

                                    <h3 class="fw-bolder mb-4 mt-5">Internet věcí (IoT)</h3>
                                    <p class="fs-5 mb-4">Internet věcí (IoT) označuje síť fyzických zařízení, vozidel, spotřebičů a dalších fyzických objektů, které jsou vybaveny senzory, softwarem a síťovou konektivitou, která jim umožňuje shromažďovat a sdílet data. </p>
                                    <p class="fs-5 mb-4">Tato propojená zařízení (známá také jako "chytré objekty") se mohou pohybovat od jednoduchých zařízení pro "chytrou domácnost", jako jsou chytré termostaty, přes nositelná zařízení, jako jsou chytré hodinky, až po technologie zabudované do dopravních systémů. </p>

                                    <h3 class="fw-bolder mb-4 mt-5">Automatizace</h3>
                                    <p class="fs-5 mb-4">Automatizace je použití technologie k provádění úkolů s minimálním lidským zásahem. V projektech chytrých měst pomáhá automatizace městům lépe reagovat na data v reálném čase, která jsou přenášena připojenými zařízeními v internetu věcí. </p>
                                    <p class="fs-5 mb-4">Prostřednictvím automatizace lze například zapínat a vypínat pouliční osvětlení v závislosti na zpětné vazbě ze senzorů, které detekují světlo a pohyb.</p>

                                    <h3 class="fw-bolder mb-4 mt-5">Umělá inteligence (AI)</h3>
                                    <p class="fs-5 mb-4">Umělá inteligence kombinuje počítačovou vědu a robustní datové sady, aby umožnila řešení problémů.</p>
                                    <p class="fs-5 mb-4">Algoritmy umělé inteligence mohou například optimalizovat trasy svozu odpadu a snížit emise uhlíku městskými popelářskými vozy.</p>

                                    <h3 class="fw-bolder mb-4 mt-5">Chytrá doprava</h3>
                                    <p class="fs-5 mb-4">Chytrá doprava je základním kamenem plánování chytrých měst. Internet věcí, umělá inteligence a další technologie, jako je geolokace, umožňují místním samosprávám a partnerům ze soukromého sektoru shromažďovat data v reálném čase.</p>

                                    <h3 class="fw-bolder mb-4 mt-5">Chytrá energie</h3>
                                    <p class="fs-5 mb-4">Pokročilý software a analytické nástroje mohou analyzovat data poskytovaná prostřednictvím připojených zařízení, aby identifikovaly vzorce spotřeby energie a předpovídaly budoucí spotřebu energie.</p>
                                </section>

                            </section>
                        </article>
                        <!-- Komentare-->
                        <?php include 'komentare.php'; ?>

                    </div>
                </div>
            </div>
        </section>


    </main>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>