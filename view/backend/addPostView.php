<?php

$this->title = 'Article';

//var_dump($post);
//$data = $post->fetch();
//var_dump($data);

?>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#content',
        language_url : '/projetsoc/jean-forteroche/public/tinymce/language/fr_FR.js',
        language: 'fr_FR',

    });
</script>
<p><a href="index.php?action=admin">Retour au tableau de bord</a></p>

<form method="post" action="index.php?action=logout">

    <p>
        <input type="hidden" name="operation" value="logout"/>
        <input type="submit" value="Se déconnecter"/>
    </p>

</form>


<form method="post" action="index.php?action=addpost">
    <p>
        <label for="title">Titre</label><input type="text" name="title" id="title" value="<?=isset($post) === true ? $post['title'] : "" ?>"   />
    </p>

    <p>
        <label for="content">Contenu</label><textarea name="content" id="content" value=""><?=isset($post) === true ?$post['content'] : "" ?></textarea>
    </p>

    <p>
        <input type="submit" value="Enregistrer"/>
    </p>

</form>
