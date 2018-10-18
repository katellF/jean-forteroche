<?php
$this->title = 'Commentaires';
?>
<p class="margin-top50 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1"
                                                         href="index.php?action=admin">Retour au tableau de bord</a></p>

<h1 class="text-center margin-top50 margin-bottom50">Liste des commentaires</h1>

<nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">
    <a class="margin-right15 color_white" href="index.php?action=moderation&status=all">Tous</a>
    <a class="margin-right15 color_white" href="index.php?action=moderation&status=approved">Approuver</a>
    <a class="margin-right15 color_white" href="index.php?action=moderation">En attente</a>
    <a class="margin-right15 color_white" href="index.php?action=moderation&status=trash">Corbeille</a>
</nav>

<div class="container margin-top50">

    <?php

    while ($data = $comments->fetch()) {
    ?>
    <div class="border-6BC3D1">

        <div>
            <h2 class="margin-bottom25 margin-top25">
                <?= htmlspecialchars($data['author']) ?>
                <em class="font_size_60">le <?= $data['comment_date_fr'] ?></em>
            </h2>
            <p class="color-138597"><strong>statut: <?= helpers::labelCommentStatus($data['status'])?></strong></p>
            <p><?= $data['comment'] ?></p>

        </div>

        <div class="d-flex justify-content-end margin-bottom25">
            <?php if ($data['status'] === 'pending' || $data['status'] === 'trash') { ?>
                <form class="margin-right15" method="post"
                      action="index.php?action=moderation&commentid=<?= $data["id"] ?>">

                    <input type="hidden" name="operation" value="approved"/>
                    <input type="submit" class="btn btn-primary bg-138597 approve_button" value="Approuver"/>

                </form>
                <?php
            }
            if ($data['status'] === 'approved' || $data['status'] === 'strash' ) { ?>
            <form class="margin-right15" method="post"
                  action="index.php?action=moderation&commentid=<?= $data["id"] ?>">

                <input type="hidden" name="operation" value="trash"/>
                <input type="submit" class="btn btn-primary bg-138597 pending_button" value="En attente"/>

            </form>
            <?php

            }
            if ($data['status'] === 'pending' || $data['status'] === 'approved' ) { ?>
                <form class="margin-right15" method="post"
                      action="index.php?action=moderation&commentid=<?= $data["id"] ?>">

                    <input type="hidden" name="operation" value="trash"/>
                    <input type="submit" class="btn btn-primary bg-138597 trash_button" value="Corbeille"/>

                </form>
                <?php
            }

            if ($data['status'] === 'approved' && isset($_GET['status']) && $_GET['status'] === 'approved') {
                ?>

                <a href="index.php?action=adminAnswer&commentid=<?= $data["id"] ?>"
                   class="btn btn-primary button-modify active margin-right15 bg-138597">Répondre</a>
                <?php
            }


            if ($data['status'] === 'trash' && isset($_GET['status']) && $_GET['status'] === 'trash') {
                ?>
            <form method="post" action="index.php?action=moderation&commentid=<?= $data["id"] ?>">

                <input type="hidden" name="operation" value="delete"/>
                <input type="submit" class="btn btn-primary bg-138597 delete_button" value="Supprimer"/>

            </form>
           <?php } ?>
        </div>
    </div>
        <?php
        }
        $comments->closeCursor();
        ?>

</div>

