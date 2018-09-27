<?php

$this->title = 'tableau de bord';
?>

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
        <?= nl2br(html_entity_decode(htmlspecialchars($data['content']))) ?>
        <br />
        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
    </p>
    <?php
}
$posts->closeCursor();

?>
<!-- liste des articles deja publiés avec option modifier titre : mes articles -->
<!-- possibilite de les trier par statut de les modifier et de les supprimer -->
<!-- fenetre de confirmation pour modification et suppression-->

<p><a href="index.php?action=addpost">Ajouter un article</a></p>

<!-- <a href="index.php?action=updatepost">Modifier un article</a> -->

<!-- liste des commentaires et de leur statut -->
<!-- possibilté de les trier par statut, de les modifier et de les supprimer -->
<!-- fenetre de confirmation pour modification et suppression-->

<p><a href="index.php?action=moderation">Gérer les commentaires</a></p>

