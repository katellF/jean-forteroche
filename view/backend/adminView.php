<?php

$this->title = 'tableau de bord';
?>
<h1 class="text-center margin-top50 margin-bottom50"> Liste des Chapitres </h1>

<nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">
    <a class="margin-right15 color_white" href="index.php?action=admin&status=all">Tous</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=published">Publiés</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=draft">Brouillons</a>
    <a class="color_white" href="index.php?action=admin&status=trash">Dans la corbeille</a>
</nav>
<div class="container margin-top50">

    <?php
    while ($data = $posts->fetch()) {
        ?>
        <div class="border-6BC3D1">
            <div>
                <h3 class="margin-bottom25 margin-top25">
                    <?= htmlspecialchars($data['title']) ?> <?= $data["id"] ?>
                    <p class="font_size_60">le <?= $data['creation_date_fr'] ?></p>
                    <p class="font_size_60 color-138597"><strong>statut : <?= helpers::labelPostStatus($data['status']) ?></strong></p>
                </h3>
            </div>

            <?php

            $content_clean = nl2br(html_entity_decode(htmlspecialchars($data['content'])));

            echo helpers::substrwords($content_clean, 350, '...');
            ?>
            <strong class="row no-gutters justify-content-end"><a href="index.php?action=previewpost&amp;id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-info btn-sm active button_list margin-bottom25" role="button" aria-pressed="true">Aperçu</a></strong>

            <div class="d-flex justify-content-end margin-bottom25">

                <?php if ($data['status'] === 'draft' || $data['status'] === 'trash') { ?>
                    <form class="margin-right15" method="post"
                          action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="published"/>
                        <input type="submit" class="btn btn-info bg-138597" id="confirmPublish_<?= $data["id"] ?>" value="publier"/>

                    </form>
                    <?php
                }

                if ($data['status'] === 'draft' || $data['status'] === 'published') {
                    ?>
                    <form class="margin-right15" method="post"
                          action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="trash"/>
                        <input type="submit" class="btn btn-primary bg-138597" value="Corbeille"/>

                    </form>


                    <?php
                }
                if ($data['status'] === 'trash' || $data['status'] === 'published') {
                    ?>
                    <form class="margin-right15" method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="draft"/>
                        <input type="submit" class="btn btn-primary bg-138597" value="Brouillon"/>

                    </form>


                    <?php
                }

                if ($data['status'] === 'trash' && isset($_GET['status']) && $_GET['status'] === 'trash') {
                    ?>
                    <form class="margin-right15" method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="delete"/>
                        <input type="submit" class="btn btn-primary bg-138597" value="Supprimer"/>
                    </form>

                    <?php
                }

                ?>


                <a class="btn btn-primary button-modify active bg-138597"
                   href="index.php?action=recoverpost&postid=<?= $data["id"] ?>">Modifier</a>
            </div>

        </div>
        <?php
    }


    $posts->closeCursor();

    ?>
</div>

<script type="javascript">


//    $('#confirmPublish_60').click(ConfirmClass.confirmPublish);
</script>




