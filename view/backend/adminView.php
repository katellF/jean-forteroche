<?php

$this->title = 'tableau de bord';
?>
<div class="margin-top25">
<a href="index.php?action=admin&status=all">Tous</a>
<a href="index.php?action=admin&status=published">Publié</a>
<a href="index.php?action=admin&status=pending">En attente</a>
<a href="index.php?action=admin&status=draft">Brouillon</a>
    <a href="index.php?action=admin&status=trash">Dans la corbeille</a>
</div>

    <div class="container margin-top50">
<?php


while ($data = $posts->fetch()) {
    ?>

    <div>
        <h3 class="margin-bottom25 margin-top25">
            <!--            <a href="index.php?action=post&amp;id=--><?//= $data['id'] ?><!--"">-->
            <?//= htmlspecialchars($data['title']) ?><!--</a>-->
            <?= htmlspecialchars($data['title']) ?>
            <p class="font_size_60">le <?= $data['creation_date_fr'] ?></p>
        </h3>
    </div>

    <?php

    $content_clean = nl2br(html_entity_decode(htmlspecialchars($data['content'])));

    echo helpers::substrwords($content_clean, 350, '...');

    ?>
    <div class="d-flex">

    <?php if ($data['status'] === 'draft' || $data['status'] === 'pending' || $data['status'] === 'trash') { ?>
        <form class="margin-right15" method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

            <input type="hidden" name="operation" value="published"/>
            <input type="submit" class="btn btn-primary" value="publier"/>

        </form>
        <?php
    }
    if ($data['status'] === 'draft' || $data['status'] === 'published' || $data['status'] === 'trash') {
        ?>
        <form class="margin-right15" method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

            <input type="hidden" name="operation" value="pending"/>
            <input type="submit" class="btn btn-primary" value="En attente"/>

        </form>
        <?php
    }
    ?>
    <!--        <form method="post" action="index.php?action=admin&postid=--><?//=$data["id"]?><!--">-->
    <!---->
    <!--            <input type="hidden" name="operation" value="delete"/>-->
    <!--            <input type="submit" class="btn btn-primary" value="Supprimer"/>-->
    <!---->
    <!--        </form> -->
    <?php
    if ($data['status'] === 'draft' || $data['status'] === 'published' || $data['status'] === 'pending') {
        ?>
        <form method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

            <input type="hidden" name="operation" value="trash"/>
            <input type="submit" class="btn btn-primary" value="Corbeille"/>

        </form>


        <?php
    }
    if ($data['status'] === 'trash' || $data['status'] === 'published' || $data['status'] === 'pending') {
        ?>
        <form method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

            <input type="hidden" name="operation" value="draft"/>
            <input type="submit" class="btn btn-primary" value="Brouillon"/>

        </form>


        <?php
    }

    if ($data['status'] === 'trash' && $_GET['status'] === 'trash'){
        ?>
        <form method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

            <input type="hidden" name="operation" value="delete"/>
            <input type="submit" class="btn btn-primary" value="Supprimer"/>
        </form>

        <?php
        }
    ?>
    <a href="index.php?action=recoverpost&postid=<?= $data["id"] ?>"
           class="btn btn-primary button-modify active margin-left15">Modifier</a>
        </div>
<?php
}

// Always place this at the end of the loop... not inside...
$posts->closeCursor();

?>
    </div>




