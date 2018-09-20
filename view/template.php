<!DOCTYPE html>
<html lang="fr">

<head>
<!--    <script src='https:https://cloud.tinymce.com/stable/tinymce.min.js'></script>-->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet" />

    <title><?= $title ?></title>
</head>

<body>
<header class="container">

    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
        <img src="" alt="">Aside logo book
        <div class="collapse navbar-collapse row justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=listPosts">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="index.php?action=writer">A Propos</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Chapitres
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Chapitre 1 : L'Arrivée</a>
                        <a class="dropdown-item" href="#">Chapitre 2 : La Découverte</a>
                        <a class="dropdown-item" href="#">Chapitre 3 : Les Gens</a>
                        <a class="dropdown-item" href="#">Chapitre 4 : La Chute</a>
                    </div>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=contact">Contact</a>
                </li>
                </li>
            </ul>
        </div>
   </div>
    </nav>
</header>
<?= $content ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>

<footer>

<!--    <a href="index.php?action=register" class="nav-link active">admin</a>-->
<!--    <a href="index.php?action=register"class="nav-link active">mentions legales</a>-->
    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse row justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=register">Admin <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Mentions Légales</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Me Contacter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</footer>

</html>