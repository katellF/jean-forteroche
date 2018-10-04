<?php

$this->title = 'tableau de bord';
?>
<div class="margin-top25">
<a href="index.php?action=moderation&status=all">Tous</a>
<a href="index.php?action=moderation&status=approved">Approuver</a>
<a href="index.php?action=moderation&status=rejected">Rejeter</a>
<a href="index.php?action=moderation">En attente</a>
</div>

    <div class="container margin-top50">
<?php
while ($data = $posts->fetch()) {
    ?>

    <div>
        <h3 class="margin-bottom25 margin-top25">
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>""><?= htmlspecialchars($data['title']) ?></a>
            <p>le <?= $data['creation_date_fr'] ?></p>
        </h3>
    </div>

    <?php

    $content_clean =  nl2br(html_entity_decode(htmlspecialchars($data['content'])));

    echo helpers::substrwords($content_clean , 350, '...'  );

    ?>
<div class="d-flex">

    <?php if($data['status']=== 'draft' || $data['status']=== 'rejected' ){?>
        <form class="margin-right15" method="post" action="index.php?action=admin&postid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="approved"/>
            <input type="submit" class="btn btn-primary" value="Approuver"/>

        </form>
    <?php
}
    if($data['status']=== 'draft' || $data['status']=== 'approved' ){?>
        <form class="margin-right15" method="post" action="index.php?action=admin&postid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="rejected"/>
            <input type="submit" class="btn btn-primary" value="Rejeter"/>

        </form>
    <?php
}
?>
        <form method="post" action="index.php?action=admin&postid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="delete"/>
            <input type="submit" class="btn btn-primary" value="Supprimer"/>

        </form>


</div>
<?php
        }

$posts->closeCursor();

?>
    </div>




