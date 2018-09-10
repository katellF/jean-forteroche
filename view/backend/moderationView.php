<?php
$this->title = 'Commentaires';
?>
<a href="index.php?action=moderation&status=all">Tous</a>
<a href="index.php?action=moderation&status=approved">Approuver</a>
<a href="index.php?action=moderation&status=rejected">Rejeter</a>
<a href="index.php?action=moderation">En attente</a>
<a href="index.php?action=moderation">Supprimer</a>



<h2>Commentaires</h2>
<p>Liste des commentaires du blog</p>
<?php

//var_dump($comments->fetchAll());

while ($data = $comments->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['author']) ?>
            <em>le <?= $data['comment_date_fr'] ?></em>
        </h3>
    </div>
  <p>statut: <?=$data['status']?></p>

    <?php if($data['status']=== 'pending' || $data['status']=== 'rejected' ){?>
    <form method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="approved"/>
            <input type="submit" value="Approuver"/>


    </form>
    <?php
    }
    ?>
    <?php if($data['status']=== 'pending' || $data['status']=== 'approved' ){?>
    <form method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">


            <input type="hidden" name="operation" value="rejected"/>
            <input type="submit" value="rejeter"/>


    </form>
        <?php
    }
?>
    <form method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">


            <input type="hidden" name="operation" value="delete"/>
            <input type="submit" value="supprimer"/>


    </form>
<?php
}
$comments->closeCursor();

?>



