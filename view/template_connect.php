<!DOCTYPE html>
<html lang="fr">

<head>
    <!--    <script src='https:https://cloud.tinymce.com/stable/tinymce.min.js'></script>-->

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php
    require(dirname(__FILE__) . '/includes/scripts_head.php');
    ?>

    <title><?= $title ?></title>
</head>

<body>
<header class="container">

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse row justify-content-end menu_burger" id="navbarTogglerDemo03">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item active border_nav color_link">
                        <a class="nav-link color_link" href="index.php?action=home">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active border_nav color_link">

                        <a class="nav-link color_link" href="index.php?action=writer">A Propos</a>

                    <li class="nav-item active border_nav color_link">

                        <a class="nav-link color_link" href="index.php?action=listPosts">Chapitres</a>
                    </li>
                    <li class="nav-item active border_nav">

                        <a class="nav-link color_link" href="index.php?action=contact">Contact</a>
                    </li>
                    <li class="nav-item active border_nav">
                        <a class="nav-link color_link" href="index.php?action=logout">Se deconnecter</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color_link" href="index.php?action=admin"> Tabeau de bord</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>
<?= $content ?>

<?php
require(dirname(__FILE__) . '/includes/scripts_footer.php');
?>

</body>

<?php
require(dirname(__FILE__) . '/includes/footer.php');
?>

</html>