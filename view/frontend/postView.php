<?php $this->title = htmlspecialchars($post['title']);

?>
<div class="text-center title_Accueil">
    <h1 class="font_size_3">Billet Simple pour l'Alaska </h1>
    <p class="font_size_1_5 color_343a40"><?= htmlspecialchars($post['title']) ?></p>
</div>
<!--<p><a href="index.php">Retour à la liste des articles</a></p>-->

        <h2 class="text-center ligne_top ligne_bottom">
            <?= htmlspecialchars($post['title']) ?> <br/>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h2>
<div class="container">
        <p>
            <?= nl2br(html_entity_decode(htmlspecialchars($post['content']))) ?>

        </p>
    </div>

    <h3 class="container">Commentaires</h3>

<?php

while ($comment = $comments->fetch()) {
    ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p> <em><a href="index.php?action=notification&amp;commentid=<?= $comment['id']?>&amp;postid=<?= $post['id']?>">Signaler un commentaire</a></em>
<?php
}
?>
<div class="container">
    <h2>Ajouter un Commentaire</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div class="form-group">
            <label for="author">Auteur</label><br/>
            <input type="text" class="form-control" id="author" name="author"/>
        </div>
        <div class="form-group">
            <label for="comment">Commentaire</label><br/>
            <textarea class="form-control" id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Envoyer"/>
        </div>
    </form>
</div>


