<?php
$this->title = 'Ajouter un commentaire';
while ($comment = $comments->fetch()) {
?>
    <p class="margin-top25 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1" href="index.php?action=admin">Retour au tableau de bord</a></p>

    <h1 class="text-center margin-top50 margin-bottom50">Commentaire</h1>
<div class="container">
    <p class="margin-top25"><strong><?= htmlspecialchars($comment['author']) ?><br/></strong> le <?= $comment['comment_date_fr'] ?></p>
<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
</div>
<?php

    $post_id = $comment['post_id'];
}

$comments->closeCursor();

?>

<div class="container">
    <h2 class="margin-bottom25 margin-top25">Ajouter un  commentaire</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post_id ?>" method="post">
        <div class="form-group">
            <label for="author" class="font-weight-bold">Auteur</label><br/>
            <?=$_SESSION['pseudo']?>
        </div>
        <div class="form-group">
            <label for="comment" class="font-weight-bold">Commentaire</label><br/>
            <textarea class="form-control" id="comment" name="comment"></textarea>
        </div>
        <input type="hidden" name="author" value="<?=$_SESSION['pseudo']?>"/>
        <input type="hidden" name="source" value="admin"/>
        <div>
            <input type="submit" class="btn btn-primary bg-138597" value="Envoyer"/>
        </div>
    </form>
</div>

