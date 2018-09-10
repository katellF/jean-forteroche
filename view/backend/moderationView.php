<?php
$this->title = 'Commentaires';
?>

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
    <form method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="approved"/>
            <input type="submit" value="Approuver"/>


    </form>
    <form method="post" action="index.php?action=moderation&commentid=<?=$data["id"]?>">


            <input type="hidden" name="operation" value="rejected"/>
            <input type="submit" value="rejeter"/>


    </form>

    <?php
}
$comments->closeCursor();

?>



