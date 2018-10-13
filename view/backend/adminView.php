<?php

$this->title = 'tableau de bord';
?>
<h1 class="text-center margin-top50 margin-bottom50"> Liste des Chapitres </h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">
    <!--<div class="margin-top25 margin-bottom25 text-center">-->
    <a class="margin-right15 color_white" href="index.php?action=admin&status=all">Tous</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=published">Publié</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=pending">En attente</a>
    <a class="margin-right15 color_white" href="index.php?action=admin&status=draft">Brouillon</a>
    <a class="color_white" href="index.php?action=admin&status=trash">Dans la corbeille</a>
    <!--</div>-->
</nav>
<div class="container margin-top50">

    <?php
    while ($data = $posts->fetch()) {
        ?>
        <div class="border-6BC3D1">
            <div>
                <h3 class="margin-bottom25 margin-top25">
                    <!--            <a href="index.php?action=post&amp;id=--><?//= $data['id'] ?><!--"">-->
                    <?//= htmlspecialchars($data['title']) ?><!--</a>-->
                    <?= htmlspecialchars($data['title']) ?>
                    <p class="font_size_60">le <?= $data['creation_date_fr'] ?></p>
                    <p class="font_size_60 color-138597"><strong>statut : <?= $data['status'] ?></strong></p>
                </h3>
            </div>

            <?php

            $content_clean = nl2br(html_entity_decode(htmlspecialchars($data['content'])));

            echo helpers::substrwords($content_clean, 350, '...');

            ?>
            <div class="d-flex justify-content-end margin-bottom25">

                <?php if ($data['status'] === 'draft' || $data['status'] === 'pending' || $data['status'] === 'trash') { ?>
                    <form class="margin-right15" method="post"
                          action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="published"/>
                        <input type="submit" class="btn btn-info bg-138597" value="publier"/>

                    </form>
                    <?php
                }
                if ($data['status'] === 'draft' || $data['status'] === 'published' || $data['status'] === 'trash') {
                    ?>
                    <form class="margin-right15" method="post"
                          action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="pending"/>
                        <input type="submit" class="btn btn-primary bg-138597 " value="En attente"/>

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
                    <form class="margin-right15" method="post"
                          action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="trash"/>
                        <input type="submit" class="btn btn-primary bg-138597" value="Corbeille"/>

                    </form>


                    <?php
                }
                if ($data['status'] === 'trash' || $data['status'] === 'published' || $data['status'] === 'pending') {
                    ?>
                    <form method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="draft"/>
                        <input type="submit" class="btn btn-primary bg-138597" value="Brouillon"/>

                    </form>


                    <?php
                }

                if ($data['status'] === 'trash' && isset($_GET['status']) && $_GET['status'] === 'trash') {
                    ?>
                    <form method="post" action="index.php?action=admin&postid=<?= $data["id"] ?>">

                        <input type="hidden" name="operation" value="delete"/>
                        <input type="submit" class="btn btn-primary bg-138597" value="Supprimer"/>
                    </form>

                    <?php
                }

                ?>


                <a class="btn btn-primary button-modify active margin-left15 bg-138597"
                   href="index.php?action=recoverpost&postid=<?= $data["id"] ?>">Modifier</a>
            </div>

        </div>
        <?php
    }

    // Always place this at the end of the loop... not inside...
    $posts->closeCursor();

    ?>
</div>




