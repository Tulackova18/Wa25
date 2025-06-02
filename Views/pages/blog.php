
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
             

            <!--Uvodni článek -->
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">Smart Cities Blog</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">Úvodní článek</div>
                                        <div class="h2 fw-bolder">Úvod do Smart Cities</div>
                                        <p>Chytrá města přinášejí revoluci v životě obyvatel díky moderním technologiím. Tyto inovace nejen zlepšují dopravní systémy a energetiku, ale také snižují emise a podporují udržitelný rozvoj. Objevte, jak bude vypadat život v budoucnosti.</p>
                                        <a class="stretched-link text-decoration-none" href="blog-p_1.php"> Přečtěte si více <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <img class="card-img-top" src="https://julienflorkin.com/wp-content/uploads/2023/08/Smart-Cities-25.webp" alt="Chytrá města: 7 zajímavých kapitol o udržitelných a inkluzivních městských prostorech. Online. In: Julienflorkin.com. 2023 Dostupné z: https://julienflorkin.com/cs/technika/inteligentn%C3%AD-m%C4%9Bsta/inteligentn%C3%AD-m%C4%9Bsta/. [cit. 2024-10-19]." style="width: 650px; height: 400px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Odstraněná část s novinkami a odkazy na soc.sítě-->


            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5">
                    <h2 class="fw-bolder fs-5 mb-4">Ostatní články</h2>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://smart-structures.com/wp-content/uploads/2023/12/1701481408924.png" alt="Emerging Technologies in Waste Management: Paving the Way for Smarter Cities. Online. In: Smart-structures.com. 2023. Dostupné z: https://smart-structures.com/emerging-technologies-in-waste-management-paving-the-way-for-smarter-cities/. [cit. 2024-10-19]." style="width: 380px; height: 250px;" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Média</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="blog-p_2.php"><div class="h5 card-title mb-3">Technologie chytrých měst</div></a> <!-- Druhy članek-->
                                    <p class="card-text mb-0">Technologie proměňují města v inteligentní a udržitelná centra budoucnosti. O které technologie se jedná a jak konkrétně nám mohou pomoci, se dočtete v tomto článku.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Lenka Tuláčková</div>
                                                <div class="text-muted">Březen 12, 2023 &middot;</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 mb-5"> <!-- Přidání nových článků-->
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://media.licdn.com/dms/image/D4E12AQGN7fZ9Km3ktQ/article-cover_image-shrink_720_1280/0/1708669549992?e=2147483647&v=beta&t=TK7_hp_ueBp54STMSmE95zgB5-abNXnozEVjOTtFSro" alt="Climate Change and Smart City Solutions: Technologies for Urban Resilience. Online. In: Linkedin.com. 2024. Dostupné z: https://www.linkedin.com/pulse/climate-change-smart-city-solutions-technologies-urban-bhoda-zhwne. [cit. 2024-10-19]." style="width: 380px; height: 250px;" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Média</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="blog-p_3.php"><div class="h5 card-title mb-3">Životní prostředí</div></a>
                                    <p class="card-text mb-0">Chytrá města využívají technologie k ochraně životního prostředí. Díky smart zavlažování, zeleným domům a dalším inovacím se města stávají šetrnějšími k přírodě, snižují emise a zlepšují kvalitu ovzduší.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Lenka Tuláčková</div>
                                                <div class="text-muted">Duben 23, 2023 &middot;</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://assets.bizclikmedia.net/1800/764cf5e51d09774947cbcd2ffb940b9d:c4aac49f41895f6d5d825979c98d6e57/swapnil-bapat-sj7pyyjfyua-unsplash.jpg" alt="Top 10: Most Sustainable Smart Cities. Online. In: Sustainabilitymag.com. 2023. Dostupné z: https://sustainabilitymag.com/articles/top-10-smart-cities-in-the-world-in-2023. [cit. 2024-10-19]." style="width: 380px; height: 250px;"/>
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Novinka</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="blog-p_4.php"><div class="h5 card-title mb-3">Projekty chytrých měst po celém světě</div></a>
                                    <p class="card-text mb-0">Rozvoj chytrých měst probíhá po celém světě. Může se až zdát, že jednotlivé státy mezi sebou soupeří ve výstavbě chytrých měst. Dokončené stavby pomáhají šetřit jak přírodu tak i náš čas. </p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Lenka Tuláčková</div>
                                                <div class="text-muted">Červen 2, 2023 &middot;</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-5"> <!-- Přidání nových článků-->
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="https://cdn.lovin.co/wp-content/uploads/sites/28/2024/02/28105056/jean-macedo-4.jpg" alt="Neom’s “The Line” Project Is Getting Closer To Reality. Online. In: Lovin neom. 2024. Dostupné z: https://lovin.co/neom/en/latest/neoms-the-line-project-is-getting-closer-to-reality/. [cit. 2024-10-19]." style="width: 380px; height: 250px;"/>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Novinka</div>
                                <a class="text-decoration-none link-dark stretched-link" href="blog-p_5.php"><div class="h5 card-title mb-3">The Line </div></a>
                                <p class="card-text mb-0">The Line je nejmodernější chytré město ve výstavbě, které představuje perfektní balanc mezi dechberoucím urbanismem a praktickým využitím. Město bude revoluční díky cestování bez automobilů či vzniku nulových emisí. Nabídnout ale může mnohem více:</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">Lenka Tuláčková</div>
                                            <div class="text-muted">Srpen, 2023 &middot; </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vlastní články-->
            <?php if (isset($_SESSION['user_id'])): ?>
            <div class="container px-5 mb-4">
                <a href="../post/create_user_post.php" class="btn btn-primary">Přidat vlastní článek</a>
            </div>
            <?php endif; ?>
                   
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
