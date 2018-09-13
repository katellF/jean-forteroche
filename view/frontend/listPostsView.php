<?php $this->title = 'Mon blog';

?>
<div class="container">
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
while ($data = $posts->fetch()) {
    ?>

    <div>
        <h3>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>""><?= htmlspecialchars($data['title']) ?></a>
            <p>le <?= $data['creation_date_fr'] ?></p>
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
</div>



