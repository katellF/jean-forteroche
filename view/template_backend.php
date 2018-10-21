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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse row justify-content-end menu_burger" id="navbarTogglerDemo03">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item active border_nav color_link">
                        <a class="nav-link color_link" href="index.php?action=addpost">Ajouter un Article<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active border_nav color_link">

                        <a class="nav-link color_link" href="index.php?action=moderation">Commentaires<span class="border border-primary rounded-circle circle-comment margin-left3"><?= $pendingComment ?></span></a>

                    <li class="nav-item active border_nav color_link">

                        <a class="nav-link color_link" href="index.php?action=adminNotification">Notifications<span class="border border-primary rounded-circle circle-notif margin-left3"><?= $unreadNotif ?></span></a>
                    </li>
                    <li class="nav-item active border_nav color_link">

                        <a class="nav-link color_link" href="index.php?action=admincontact">Contacts</a>
                    </li>
                    <li class="nav-item active border_nav">

                        <a class="nav-link color_link" href="index.php?action=home">retour au site</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color_link" href="index.php?action=logout">se déconnecter</a>
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
        <div class="container">
            <div class="navbar-collapse row justify-content-center" id="navbarTogglerDemo03">
                <ul class="navbar-nav flex_rowR">
                    <li class="nav-item active margin_rightR">
                        <a class="nav-link" href="index.php?action=register">Admin <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Mentions Légales</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</footer>

</html>