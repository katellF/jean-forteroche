<?php
$this->title = 'Commentaires';
?>
<p class="margin-top25 margin-bottom25"><a href="index.php?action=admin">Retour au tableau de bord</a></p>

<div class="margin-bottom25">
<a href="index.php?action=moderation&status=all">Tous</a>
<a href="index.php?action=moderation&status=approved">Approuver</a>
<a href="index.php?action=moderation&status=rejected">Rejeter</a>
<a href="index.php?action=moderation">En attente</a>
</div>

<h2>Commentaires</h2>
<p>Liste des commentaires du blog</p>
<?php

while ($data = $comments->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['author']) ?>
            <em class="font_size_60">le <?= $data['comment_date_fr'] ?></em>
        </h3>

        <p><?= $data['comment'] ?></p>

    </div>
  <p>statut: <?=$data['status']?></p>

<div class="d-flex">
    <?php if($data['status']=== 'pending' || $data['status']=== 'rejected' ){?>
    <form class="margin-right15" method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">

        <input type="hidden" name="operation" value="approved"/>
        <input type="submit" class="btn btn-primary" value="Approuver"/>

    </form>
    <?php
    }
    ?>
    <?php if($data['status']=== 'pending' || $data['status']=== 'approved' ){?>
    <form class="margin-right15" method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">

        <input type="hidden" name="operation" value="rejected"/>
        <input type="submit" class="btn btn-primary" value="Rejeter"/>

    </form>
        <?php
    }

    if ($data['status'] === 'approved' && isset($_GET['status']) && $_GET['status'] === 'approved'){
    ?>

        <a href="index.php?action=adminAnswer&commentid=<?= $data["id"] ?>"
           class="btn btn-primary button-modify active margin-left15">Répondre</a>

<!--    <form method="post" action="index.php?action=moderation&status='approved'&commentid=--><?//= $data["id"] ?><!--">-->
<!---->
<!--        <input type="hidden" name="operation" value="answered"/>-->
<!--        <input type="submit" class="btn btn-primary" value="Répondre"/>-->
<!--    </form>-->

    <?php
    }
    ?>
    <form method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">

        <input type="hidden" name="operation" value="delete"/>
        <input type="submit" class="btn btn-primary" value="Supprimer"/>

    </form>
</div>
<?php
}
$comments->closeCursor();
?>



