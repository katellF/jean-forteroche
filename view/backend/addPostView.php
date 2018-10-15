<?php

$this->title = 'Article';

?>

<p class="margin-top25 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1"
                                                         href="index.php?action=admin">Retour au tableau de bord</a></p>


<h1 class="text-center margin-top50 margin-bottom50">Ajouter un Chapitre</h1>

<nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">
    <a class="margin-right15 color_white" href="index.php?action=moderation&status=all">Tous</a>
    <a class="margin-right15 color_white" href="index.php?action=moderation&status=approved">Approuver</a>
    <a class="margin-right15 color_white" href="index.php?action=moderation&status=rejected">Rejeter</a>
    <a class="margin-right15 color_white" href="index.php?action=moderation">En attente</a>
</nav>


<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

<script>
    tinymce.init({
        selector: '#content',
        language_url : '/projetsoc/jean-forteroche/public/tinymce/language/fr_FR.js',
        language: 'fr_FR'

    });
</script>

<div class="container margin-top50">

<form method="post" action="index.php?action=addpost">
    <div class="form-group">
        <label for="title">Titre</label> <input type="text" name="title" id="title" value="<?=isset($post) === true ? $post['title'] : "" ?>"   />
    </div>
    <div class="form-group color-138597 font-weight-bold">
    <?=isset($post) === true ? 'Status : '. helpers::labelPostStatus($post['status']) : "" ?>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label><textarea name="content" id="content" value=""><?=isset($post) === true ?$post['content'] : "" ?></textarea>
    </div>

    <div class="row justify-content-between no-gutters">
<!--        <div class="col-1"></div>-->
        <input type="hidden" value="<?=isset($post) === true ? $post['id'] : "" ?>" name="postid">
        <input type="submit" class="btn btn-primary bg-138597 col-3"  name="status" value="Brouillon"/>
<!--        <div class="col-4"></div>-->
        <input type="submit" class="btn btn-primary bg-6BC3D1 col-3" name="status" value="Publier"/>
<!--        <div class="col-1"></div>-->
    </div>
</form>


</div>

