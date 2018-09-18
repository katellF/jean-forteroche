<?php $this->title = 'Jean Forteroche';

?>
<div class="relative">
<div class="text-center title_Accueil ">

<h1 class="font_size_3">Billet simple pour l'Alaska</h1>
    <p class="font_size_1_5 color_343a40">Le Nouveau Livre de Jean Forteroche</p>

</div>
    <h2 class="text-center ligne_top ligne_bottom">Découvrez le livre</h2>
<div class="container">

<?php
while ($data = $posts->fetch()) {
    ?>

    <div>
        <h3 class="text-center">
            <?= htmlspecialchars($data['title']) ?><br/>
            <em class="font_size_60">le <?= $data['creation_date_fr'] ?></em>
        </h3>
    </div>


<?php

    $content_clean =  nl2br(html_entity_decode(htmlspecialchars($data['content'])));

    echo helpers::substrwords($content_clean , 250, '...'  );

       ?>

        <br />
        <strong class="italic"><a href="index.php?action=post&amp;id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-secondary btn-lg active button_list" role="button" aria-pressed="true">Lire la suite</a></strong>
<!--    <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Link</a>-->

    <?php
}
$posts->closeCursor();

?>
</div>
</div>


