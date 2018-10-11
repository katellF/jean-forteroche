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
        language: 'fr_FR'

    });
</script>

<p class="margin-top25 margin-bottom25"><a class="btn btn-info color_white bg-6BC3D1" href="index.php?action=admin">Retour au tableau de bord</a></p>

<div class="container">
<form method="post" action="index.php?action=addpost">
    <div class="form-group">
        <label for="title">Titre</label> <input type="text" name="title" id="title" value="<?=isset($post) === true ? $post['title'] : "" ?>"   />
    </div>

    <div class="form-group">
        <label for="content">Contenu</label><textarea name="content" id="content" value=""><?=isset($post) === true ?$post['content'] : "" ?></textarea>
    </div>

    <div class="form-group">
<!--        <input type="submit" value="Enregistrer"/>-->
        <input type="submit" class="btn btn-primary" value="Enregistrer"/>
    </div>

</form>
</div>

