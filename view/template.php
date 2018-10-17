<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
        require (dirname(__FILE__) . '/includes/scripts_head.php');
    ?>

    <title><?= $title ?></title>
</head>

<body>
<header class="container">

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
<!--        <a class="navbar-brand" href="#">Navbar</a>-->

<!--        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">-->
        <div class="collapse navbar-collapse row justify-content-end" id="navbarTogglerDemo03">
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item active">
<!--                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
                    <a class="nav-link" href="index.php?action=home">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
<!--                    <a class="nav-link" href="#">Link</a>-->
                    <a class="nav-link" href="index.php?action=writer">A Propos</a>
                <li class="nav-item active">
<!--                    <a class="nav-link disabled" href="#">Disabled</a>-->
                    <a class="nav-link" href="index.php?action=listPosts">Chapitres</a>
                </li>
                <li class="nav-item active">
<!--                    <a class="nav-link disabled" href="#">Disabled</a>-->
                    <a class="nav-link" href="index.php?action=contact">Contact</a>
                </li>
            </ul>
<!--            <form class="form-inline my-2 my-lg-0">-->
<!--                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--            </form>-->

        </div>

        </div>


    </nav>

<!--    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">-->
<!--   <div class="container">-->
<!--<!--      <img src="" alt="">Aside logo book-->
<!--        <div class="collapse navbar-collapse row justify-content-end" id="navbarNavDropdown">-->
<!--            <ul class="navbar-nav">-->
<!--                <li class="nav-item active">-->
<!--                    <a class="nav-link" href="index.php?action=home">Accueil <span class="sr-only">(current)</span></a>-->
<!--                </li>-->
<!--                <li class="nav-item active ">-->
<!--                    <a class="nav-link" href="index.php?action=writer">A Propos</a>-->
<!--                </li>-->
<!--                <li class="nav-item active">-->
<!--                    <a class="nav-link" href="index.php?action=listPosts">Chapitres</a>-->
<!--                </li>-->
<!--                <li class="nav-item active">-->
<!--                    <a class="nav-link" href="index.php?action=contact">Contact</a>-->
<!--                </li>-->
<!---->
<!--            </ul>-->
<!--        </div>-->
<!--   </div>-->
<!--    </nav>-->
</header>
<?= $content ?>


<?php
require (dirname(__FILE__) . '/includes/scripts_footer.php');
?>

</body>

<footer id="footer">

    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">

            <div class="collapse navbar-collapse row justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=register">Admin <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Mentions Légales</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>

    </nav>

</footer>
</div>
</html>