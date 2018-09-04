<?php $this->title = 'Mon blog';

?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
while ($data = $posts->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
    </div>
    <p>
        <?= nl2br(htmlspecialchars($data['content'])) ?>
        <br />
        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
    </p>
    <?php
}
$posts->closeCursor();

?>




