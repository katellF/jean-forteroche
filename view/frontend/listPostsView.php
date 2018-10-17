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
<!--            <em class="font_size_60">le --><?//= $data['creation_date_fr'] ?><!--</em>-->
        </h3>
    </div>


<?php

    $content_clean =  nl2br(html_entity_decode(htmlspecialchars($data['content'])));

    echo helpers::substrwords($content_clean , 250, '...'  );

       ?>

        <br />

        <strong class="italic row no-gutters justify-content-end"><a href="index.php?action=post&amp;postid=<?= htmlspecialchars($data['id']) ?>" class="btn btn-info btn-sm active button_list" role="button" aria-pressed="true">Lire la suite</a></strong>

    <?php
}



$posts->closeCursor();


if( $navigation['prev_page'] > 0){
    ?>
    <strong class="italic row no-gutters justify-content-center">
    <a href="index.php?action=listPosts&page=<?= $navigation['prev_page'] ?>"class="btn btn-info btn-sm active button-pagination">Page précédente</a>
    </strong>
    <?php

}

if( $navigation['next_page'] > 0){
    ?>

    <strong class="italic row no-gutters justify-content-center">
        <a href="index.php?action=listPosts&page=<?= $navigation['next_page'] ?>" class="btn btn-info btn-sm active button-pagination">Page suivante</a>
    </strong>

<?php

}

?>

</div>
</div>


