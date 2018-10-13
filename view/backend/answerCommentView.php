<?php
while ($comment = $comments->fetch()) {
?>
<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php

    $post_id = $comment['post_id'];

}

$comments->closeCursor();

?>
<div class="container">
    <h2>Repondre</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post_id ?>" method="post">
        <div class="form-group">
            <label for="author">Auteur</label><br/>
            <?=$_SESSION['pseudo']?>
        </div>
        <div class="form-group">
            <label for="comment">Commentaire</label><br/>
            <textarea class="form-control" id="comment" name="comment"></textarea>
        </div>
        <input type="hidden" name="author" value="<?=$_SESSION['pseudo']?>"/>
        <input type="hidden" name="source" value="admin"/>
        <div>
            <input type="submit" class="btn btn-primary" value="Envoyer"/>
        </div>
    </form>
</div>

