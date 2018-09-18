<?php $this->title = 'Mon blog';

?>
<div class="relative">
<div class="text-center title_Accueil ">

<h1 class="font_size_3">Billet simple pour l'Alaska</h1>
    <p class="font_size_1_5">Le Nouveau Livre de Jean Forteroche</p>

</div>
<!--    <div class="width_100">-->
<!--    <img src="public/css/images/Projet_4_image1.png" class="img-fluid"/>-->
<!--    </div>-->
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
    <p class="text">

<?php

    $content_clean =  nl2br(html_entity_decode(htmlspecialchars($data['content'])));

    echo helpers::substrwords($content_clean , 250, '...'  );

       ?>

        <br />
        <strong class="italic"><a href="index.php?action=post&amp;id=<?= htmlspecialchars($data['id']) ?>">Lire la suite</a></strong>
    </p>
    <?php
}
$posts->closeCursor();

?>
</div>
</div>


