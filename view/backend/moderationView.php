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
    <form method="post" action="index.php?action=moderation">


            <input type="hidden" name="operation" value="approuver"/>
            <input type="submit" value="Approuver"/>


    </form>
    <form method="post" action="index.php?action=moderation">


            <input type="hidden" name="operation" value="supprimer"/>
            <input type="submit" value="Supprimer"/>


    </form>

    <?php
}
$comments->closeCursor();

?>



