<?php

$this->title = 'tableau de bord';
?>

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo 'Bonjour ' . $_SESSION['pseudo'];
        }
?>

<form method="post" action="index.php?action=logout">

    <p>
      <input type="hidden" name="operation" value="logout"/>
<!--        <input type="submit" value="Se déconnecter" class="color_green" />-->
        <input type="submit" class="btn btn-primary" value="se deconnecter"/>
    </p>

</form>


<!-- liste des articles deja publiés avec option modifier titre : mes articles -->
<!-- possibilite de les trier par statut de les modifier et de les supprimer -->
<!-- fenetre de confirmation pour modification et suppression-->

<p><a href="index.php?action=addpost">Ajouter un article</a></p>

<!-- <a href="index.php?action=updatepost">Modifier un article</a> -->

<!-- liste des commentaires et de leur statut -->
<!-- possibilté de les trier par statut, de les modifier et de les supprimer -->
<!-- fenetre de confirmation pour modification et suppression-->

<p><a href="index.php?action=moderation">Gérer les commentaires</a></p>

<!--<div class="container">-->
<!---->
<!--    <h2>Se connecter</h2>-->
<!---->
<!---->
<!--    <form action="index.php?action=connection" method="post">-->
<!--        <div class="form-group">-->
<!--            <label for="pseudo">pseudo</label><br/>-->
<!--            <input type="text" class="form-control" id="pseudoConnect" placeholder="pseudo" name="pseudoConnect">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="password">Mot de passe</label>-->
<!--            <input type="password" class="form-control" id="passwordConnect" placeholder="Password" name="passwordConnect">-->
<!--        </div>-->
<!--        <div>-->
<!--            <input type="submit" class="btn btn-primary" value="se connecter"/>-->
<!--        </div>-->
<!--    </form>-->
<!---->
<!--</div>-->