<?php

$this->title = 'Article';

?>

<p class="margin-top50 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1"
                                                         href="index.php?action=admin">Retour au tableau de bord</a></p>


<h1 class="text-center margin-top50 margin-bottom50">Ajouter un Chapitre</h1>

<nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">
    <a class="margin-right15 color_white" href="index.php?action=admin&status=all">Tous</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=approved">Plubiés</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=approved">Brouillons</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=trash">Corbeille</a>
</nav>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=hstszmxo6o4tpu6yiycd4kh2utvdxc650zwv9j2uc3y8ylbr"></script>

<script>
    tinymce.init({
        selector: '#content',
        language_url : '/jean-forteroche/public/tinymce/language/fr_FR.js',
        language: 'fr_FR'

    });
</script>

<div class="container margin-top50">

<form method="post" action="index.php?action=addpost">
    <div class="form-group">
        <label for="title">Titre</label> <input type="text" name="title" id="title" value="<?=isset($post) === true ? $post['title'] : "" ?>"/>
    </div>
    <div class="form-group color-138597 font-weight-bold">
    <?=isset($post) === true ? 'Statut : '. Helpers::labelPostStatus($post['status']) : "" ?>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label><textarea name="content" id="content" value=""><?=isset($post) === true ?$post['content'] : "" ?></textarea>
    </div>

    <div class="row justify-content-between no-gutters">

        <input type="hidden" value="<?=isset($post) === true ? $post['id'] : "" ?>" name="postid">
        <input type="submit" class="btn btn-primary bg-138597 col-3 draft_button"  name="status" value="Brouillon"/>
        <input type="submit" class="btn btn-primary bg-6BC3D1 col-3 publish_button" name="status" value="Publier"/>

    </div>
</form>


</div>

