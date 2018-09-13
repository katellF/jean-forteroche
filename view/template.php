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
<header class="nav justify-content-center container">

    <aside >
           <img src="" alt="">Aside logo book
    </aside>
    <nav class="nav">
        <a class="nav-link active" href="#">Accueil</a>
        <a class="nav-link active" href="#">Chapitre</a>
        <a class="nav-link active" href="#">A Propos</a>
        <a class="nav-link active" href="#">Contact</a>
    </nav>

</header>
<?= $content ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>

<footer class="nav justify-content-center container">

    <a href="index.php?action=register" class="nav-link active">admin</a>
    <a href="index.php?action=register"class="nav-link active">mentions legales</a>

</footer>

</html>