<?php

$this->title = 'Article';

?>

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
