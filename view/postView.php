<?php $this->title = htmlspecialchars($post['title']);

?>

    <h1>Mon super blog !</h1>
    <p><a href="index.php">Retour à la liste des articles</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

<?php

//while ($comment = $comments->fetch()) {
//    // faire un if (si status = approved)
//    ?>
<!--    <p><strong>--><?//= htmlspecialchars($comment['author']) ?><!--</strong> le --><?//= $comment['comment_date_fr'] ?><!--</p>-->
<!--    <p>--><?//= nl2br(htmlspecialchars($comment['comment'])) ?><!--</p> <em><a href="index.php?action=notification&amp;commentid=--><?//= $comment['id']?><!--&amp;postid=--><?//= $post['id']?><!--">Signaler un commentaire</a></em>-->
<!--    --><?php
//}
//?>

    <h2>Ajouter un Commentaire</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br/>
            <input type="text" id="author" name="author"/>
        </div>
        <div>
            <label for="comment">Commentaire</label><br/>
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>


