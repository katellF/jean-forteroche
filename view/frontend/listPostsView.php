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
<!--        --><?//= nl2br(html_entity_decode(htmlspecialchars($data['content']))) ?>
        <?php  $rest =  nl2br(html_entity_decode(htmlspecialchars(substr($data['content'],0,250))));
        echo $rest ?>

        <br />
        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></em>
    </p>
    <?php
}
$posts->closeCursor();

?>
</div>



