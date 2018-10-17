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


    <h3 class="margin-top50 margin-bottom25">Commentaires</h3>

<?php

while ($comment = $comments->fetch()) {
    ?>
    <div class="border-comment">
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p> 
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <em><a href="index.php?action=notification&amp;commentid=<?= $comment['id']?>&amp;postid=<?= $post['id']?>" class="btn btn-primary bg-138597 margin-top15">Signaler ce commentaire</a></em>
    </div>
<?php
}
?>

    <h2 class="margin-top50 margin-bottom25">Ajouter un Commentaire</h2>

    <form action="index.php?action=addComment&amp;postid=<?= $post['id'] ?>" method="post">
        <div class="form-group">
            <label for="author" class="margin-bottom15">Auteur</label><br/>
            <input type="text" class="form-control" id="author" name="author"/>
        </div>
        <div class="form-group">
            <label for="comment" class="margin-bottom15">Commentaire</label><br/>
            <textarea class="form-control" id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="hidden" name="operation" value="commentSend"/>
            <input type="submit" class="btn btn-primary bg-138597 margin-top15" value="Envoyer"/>
        </div>
    </form>
</div>


