<?php
session_start();
require_once '../../Controllers/commentController.php';

$post_id = 4;
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
                                <h1 class="fw-bolder mb-1">Projekty chytrých měst po celém světě</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Červen 2, 2025</div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light" href="blog.php">Chytrá města</a>
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="https://assets.bizclikmedia.net/1800/764cf5e51d09774947cbcd2ffb940b9d:c4aac49f41895f6d5d825979c98d6e57/swapnil-bapat-sj7pyyjfyua-unsplash.jpg" alt="Top 10: Most Sustainable Smart Cities. Online. In: Sustainabilitymag.com. 2023. Dostupné z: https://sustainabilitymag.com/articles/top-10-smart-cities-in-the-world-in-2023. [cit. 2024-10-19]." style="width: 850px; height: 450px;" /></figure>

                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4">Která městská oblast se kvalifikuje jako chytré město a která města jsou "nejchytřejší", se může lišit v závislosti na zdroji. </p>
                                <p class="fs-5 mb-4">Města v Evropě, Americe a Asii pravidelně soupeří o pozice v různých žebříčcích. Je však jasné, že místní samosprávy po celém světě přijímají různá řešení chytrých měst. Zahrnuje slavná centra globálního obchodu, jako je New York City a Singapur, až po regionální velmoci, jako je Chattanooga v Tennessee a provincie Zhejiang v Číně. </p>
                                <p class="fs-5 mb-4">V Če-ťiangu, stejně jako na mnoha dalších místech v Číně, se nabíjecí stanice pro elektromobily stávají všudypřítomnými. Provincie má údajně více než milion nabíjecích stanic. V Chattanooze zahrnují projekty chytrých měst spolupráci s různými organizacemi na monitorování kvality ovzduší prostřednictvím senzorových sítí. Projekt podporuje iniciativy v oblasti kvality ovzduší ve městech a poskytuje cenné informace zdravotnickým pracovníkům. </p>
                                <p class="fs-5 mb-4">Inovace v oblasti chytrých měst se však neodehrávají ve vzduchoprázdnu. Urbanisté, neziskové organizace a korporace se pravidelně scházejí, aby prezentovali nápady a řešení na globálních akcích. Klíčovou událostí pro takové výměny je barcelonský světový kongres Smart City Expo, který si klade za cíl "kolektivizovat městské inovace po celém světě". </p>
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