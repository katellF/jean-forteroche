<?php

$this->title = 'Article';

?>

<p><a href="index.php?action=admin">Retour au tableau de bord</a></p>

<form method="post" action="index.php?action=logout">

    <p>
        <input type="hidden" name="operation" value="logout"/>
        <input type="submit" value="Se déconnecter"/>
    </p>

</form>


<form method="post" action="index.php?action=addpost">
    <p>
        <label for="title">Titre</label><input type="text" name="title" id="title" value=""   />
    </p>

    <p>
        <label for="content">Contenu</label><textarea name="content" id="content" value=""></textarea>
    </p>

    <p>
        <input type="submit" value="Enregistrer"/>
    </p>

</form>
