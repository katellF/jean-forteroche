<?php
//session_start();

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo 'Bonjour ' . $_SESSION['pseudo'];
        }
?>

<form method="post" action="index.php?action=logout">

    <p>
      <input type="hidden" name="operation" value="logout"/>
        <input type="submit" value="Se déconnecter"/>
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

