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
<!-- liste des articles deja publié avec option modifier-->
<!--<form method="post" action="index.php?action=addpost">-->
<!---->
<!--    <p>-->
<!--        <input type="hidden" name="operation" value="addpost"/>-->
<!--        <input type="submit" value="Ajouter un article"/>-->
<!--    </p>-->
<!---->
<!--</form>-->

<a href="index.php?action=addpost">Ajouter un article</a>

<a href="index.php?action=updatepost">Modifier un article</a>
<a href="index.php?action=moderation">Gérer les commentaires</a>

<form method="post" action="index.php?action=post">

    <p>
        <input type="hidden" name="operation" value="logout"/>
        <input type="submit" value="Modifier un article"/>
    </p>

</form>

<form method="post" action="index.php?action=post">

    <p>
        <input type="hidden" name="operation" value="logout"/>
        <input type="submit" value="Gérer les commentaires"/>
    </p>

</form>