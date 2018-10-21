<?php

$this->title = 'tableau de bord';
?>

<p class="margin-top50 margin-bottom25 margin-left15 d-flex justify-content-end margin-right15"><a class="btn btn-primary bg-6BC3D1"
                                                                                                   href="index.php?action=modifypass">Modifier le mot de passe</a></p>


<h1 class="text-center margin-top50 margin-bottom50"> Liste des Contacts </h1>

<!--<nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">-->
<!--    <a class="margin-right15 color_white" href="index.php?action=admin&status=all">Tous</a>-->
<!--    <a class="margin-right15 color_white" href="index.php?action=admin&status=published">Publiés</a>-->
<!--    <a class="margin-right15 color_white" href="index.php?action=admin&status=draft">Brouillons</a>-->
<!--    <a class="color_white" href="index.php?action=admin&status=trash">Dans la corbeille</a>-->
<!--</nav>-->
<div class="container margin-top50">

    <?php

    while ($data = $contacts->fetch()) {
        ?>

        <div>
            <div>
                email: <?= htmlspecialchars($data['email']) ?> <br/>
            </div>

            <?php


    }


    $contacts->closeCursor();
    ?>
</div>





