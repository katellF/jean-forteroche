<?php $this->title = 'Mon blog';

?>



<div class="container">
<h1 class="text-center">Billet simple pour l'Alaska</h1>


<?php
while ($data = $posts->fetch()) {
    ?>

    <div>
        <h3 class="text-center">
            <?= htmlspecialchars($data['title']) ?><br/>
            <em class="font_size_60">le <?= $data['creation_date_fr'] ?></em>
        </h3>
    </div>
    <p>
<!--        --><?//= nl2br(html_entity_decode(htmlspecialchars($data['content']))) ?>
<?php $rest =  nl2br(html_entity_decode(htmlspecialchars(substr($data['content'],0,250))));
       echo $rest ?>

        <br />
        <strong><a href="index.php?action=post&amp;id=<?= htmlspecialchars($data['id']) ?>">Lire la suite</a></strong>
    </p>
    <?php
}
$posts->closeCursor();

?>
</div>



