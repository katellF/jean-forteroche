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
<p><a href="index.php?action=admin">Retour au tableau de bord</a></p>

<form method="post" action="index.php?action=logout">

    <p>
        <input type="hidden" name="operation" value="logout"/>
<!--        <input type="submit" value="Se déconnecter"/>-->
        <input type="submit" class="btn btn-primary" value="se deconnecter"/>
    </p>

</form>

<div class="container">
<form method="post" action="index.php?action=addpost">
    <div class="form-group">
        <label for="title">Titre</label><input type="text" name="title" id="title" value="<?=isset($post) === true ? $post['title'] : "" ?>"   />
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
