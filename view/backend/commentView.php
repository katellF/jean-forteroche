<?php $this->title = htmlspecialchars($post['title']);

?>

<p class="margin-top50 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1" href="index.php?action=adminNotification">Retour aux
        notifications</a></p>

<?php

$comment = $comment->fetch();

    ?>
    <div class="container border-6BC3D1 margin-top50">
        <h2  class="margin-bottom25">
            <?= htmlspecialchars($comment['author']) ?>
            <em class="font_size_60">le <?= $comment['comment_date_fr'] ?></em>
        </h2>
        <p class="color-138597"><strong>statut: <?= Helpers::labelCommentStatus($comment['status'])?></strong></p>
        <p><?= $comment['comment'] ?></p>



    <div class="d-flex justify-content-end margin-bottom25">
        <?php if ($comment['status'] === 'pending' || $comment['status'] === 'trash') { ?>
            <form class="margin-right15" method="post"
                  action="index.php?action=moderation&commentid=<?= $comment["id"] ?>">

                <input type="hidden" name="operation" value="approved"/>
                <input type="submit" class="btn btn-primary bg-138597 approve_button" value="Approuver"/>

            </form>
            <?php
        }
        if ($comment['status'] === 'approved' || $comment['status'] === 'strash' ) { ?>
            <form class="margin-right15" method="post"
                  action="index.php?action=moderation&commentid=<?= $comment["id"] ?>">

                <input type="hidden" name="operation" value="trash"/>
                <input type="submit" class="btn btn-primary bg-138597 pending_button" value="En attente"/>

            </form>
            <?php

        }
        if ($comment['status'] === 'pending' || $comment['status'] === 'approved' ) { ?>
            <form class="margin-right15" method="post"
                  action="index.php?action=moderation&commentid=<?= $comment["id"] ?>">

                <input type="hidden" name="operation" value="trash"/>
                <input type="submit" class="btn btn-primary bg-138597 trash_button" value="Corbeille"/>

            </form>
            <?php
        }

        if ($comment['status'] === 'approved') {
            ?>
            <a href="index.php?action=adminanswer&commentid=<?= $comment["id"] ?>"
               class="btn btn-primary button-modify active margin-right15 bg-138597">Répondre</a>
            <?php
        }


        if ($comment['status'] === 'trash' && isset($_GET['status']) && $_GET['status'] === 'trash') {
            ?>
            <form method="post" action="index.php?action=moderation&commentid=<?= $comment["id"] ?>">

                <input type="hidden" name="operation" value="delete"/>
                <input type="submit" class="btn btn-primary bg-138597 delete_button" value="Supprimer"/>

            </form>
        <?php } ?>
    </div>
    </div>

