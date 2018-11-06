<?php

$this->title = 'Messages';
?>
<div class="relative min-height">
<p class="margin-top50 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1" href="index.php?action=admin">Retour au
        tableau de bord</a></p>


<h1 class="text-center margin-top50 margin-bottom50"> Liste des Contacts </h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">
        <a class="margin-right15 color_white" href="index.php?action=admincontact&status=all">Tous</a>
        <a class="margin-right15 color_white" href="index.php?action=admincontact&status=archived">Archivés</a>
        <a class="margin-right15 color_white" href="index.php?action=admincontact&status=trash">Corbeille</a>
        <a class="color_white" href="index.php?action=adminContact">non lus</a>
    </nav>




    <?php

    while ($data = $contacts->fetch()) {
    ?>

    <div class="border-6BC3D1 container margin-top50">
        <h2>
            <strong class="font-weight-bold"></strong> <?= htmlspecialchars($data['firstname']) ?>
            <strong class="font-weight-bold"></strong> <?= htmlspecialchars($data['lastname']) ?> <br/>
            <em class="font_size_60">le <?= $data['contact_date_fr'] ?></em>
        </h2>
        <p class="color-138597"><strong>statut: <?=  Helpers::labelContactStatus($data['status']) ?></strong></p>
        <div>
            <strong class="font-weight-bold"> email:</strong> <?= htmlspecialchars($data['email']) ?>
        </div>
        <div>
            <strong class="font-weight-bold"> Message:</strong> <?= htmlspecialchars($data['content']) ?>
        </div>
        <div class="d-flex relative justify-content-end margin-bottom25">
        <a class="btn btn-primary bg-6BC3D1 margin-right15" href="mailto:<?= htmlspecialchars($data['email']) ?>">
            Répondre</a> <br/>

        <?php if ($data['status'] === 'unread' || $data['status'] === 'trash')  { ?>
            <form class="margin-right15" method="post" action="index.php?action=admincontact&contactid=<?= $data["id"] ?>">

                <input type="hidden" name="operation" value="archived"/>
                <input type="submit" class="btn btn-primary bg-138597 archive_button" value="Archiver"/>

            </form>
            <?php
        }
        ?>
        <?php if ($data['status'] === 'archived'|| $data['status'] === 'trash') { ?>
            <form class="margin-right15" method="post" action="index.php?action=admincontact&contactid=<?= $data["id"] ?>">

                <input type="hidden" name="operation" value="unread"/>
                <input type="submit" class="btn btn-primary bg-138597 unread_button" value="non lu"/>


            </form>
            <?php
        }

        if ($data['status'] === 'unread' || $data['status'] === 'archived' ) { ?>
            <form class="margin-right15" method="post" action="index.php?action=admincontact&contactid=<?= $data["id"] ?>">

                <input type="hidden" name="operation" value="trash"/>
                <input type="submit" class="btn btn-primary bg-138597 trash_button" value="Jeter dans la corbeille"/>

            </form>
            <?php
        }

        if ($data['status'] === 'trash' && isset($_GET['status']) && $_GET['status'] === 'trash') {
            ?>
            <form class="margin-right15" method="post" action="index.php?action=admincontact&contactid=<?= $data["id"] ?>">

                <input type="hidden" name="operation" value="delete"/>
                <input type="submit" class="btn btn-primary bg-138597 delete_button" value="supprimer"/>

            </form>
        <?php } ?>
        </div>
    </div>
</div>
    <?php
    }
    $contacts->closeCursor();
    ?>






