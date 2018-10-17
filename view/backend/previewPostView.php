<?php $this->title = htmlspecialchars($post['title']);

?>
<div class="text-center title_Accueil">
    <h1 class="font_size_3">Billet Simple pour l'Alaska </h1>
    <p class="font_size_1_5 color_343a40"><?= htmlspecialchars($post['title']) ?></p>
</div>
<!--<p><a href="index.php">Retour à la liste des articles</a></p>-->
<p class="margin-top25 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1" href="index.php?action=admin">Retour au
        tableau de bord</a></p>
<h2 class="text-center ligne_top ligne_bottom margin-top15">
    <?= htmlspecialchars($post['title']) ?> <br/>
    <em>le <?= $post['creation_date_fr'] ?></em>
</h2>
<div class="container">
    <p>
        <?= nl2br(html_entity_decode(htmlspecialchars($post['content']))) ?>

    </p>
</div>

