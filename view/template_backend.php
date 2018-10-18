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
            <div class="collapse navbar-collapse row justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=addpost">Ajouter un Article <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=moderation">Commentaires <span class="border border-primary rounded-circle circle-comment"><?= $pendingComment ?></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=adminNotification">Notifications <span class="border border-primary rounded-circle circle-notif"><?= $unreadNotif ?></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=home">retour au site</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=logout">se deconnecter</a>
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