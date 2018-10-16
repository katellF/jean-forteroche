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

    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
<!--        <img src="" alt="">Aside logo book-->
        <div class="collapse navbar-collapse row justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=home">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="index.php?action=writer">A Propos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=listPosts">Chapitres</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=contact">Contact</a>
                </li>

            </ul>
        </div>
   </div>
    </nav>
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