<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>

<div class="relative ">
    <p class="margin-top50 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1" href="index.php?action=admin">Retour au
            tableau de bord</a></p>

    <h1 class="text-center margin-top50 margin-bottom50"> Liste de notifications</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light margin-top25 margin-bottom25 text-center justify-content-center nav-filter">
        <a class="margin-right15 color_white" href="index.php?action=adminNotification&status=all">Toutes</a>
        <a class="margin-right15 color_white" href="index.php?action=adminNotification&status=archived">Archivees</a>
        <a class="margin-right15 color_white" href="index.php?action=adminNotification&status=trash">Corbeille</a>
        <a class="color_white" href="index.php?action=adminNotification">non lu</a>
    </nav>

    <div class="container margin-top50">

    <?php

    while ($data = $notifications->fetch()) {
        ?>
        <div class="border-6BC3D1">

            <div>
            <h3 class="margin-bottom25 margin-top25">
                raison : <?= htmlspecialchars($data['reason']) ?> <br/>
                <em class="font_size_60">le <?= $data['notification_date_fr'] ?></em>
            </h3>
            <p class="color-138597"><strong>statut: <?=  helpers::labelNotifStatus($data['status']) ?></strong></p>
            <p> signalement : <?= htmlspecialchars($data['content']) ?> </p>
            </div>

                <div class="d-flex relative justify-content-end margin-bottom25">

                    <?php if ($data['status'] === 'unread' || $data['status'] === 'trash')  { ?>
                        <form class="margin-right15" method="post" action="index.php?action=adminNotification&notificationid=<?= $data["id"] ?>">

                            <input type="hidden" name="operation" value="archived"/>
                            <input type="submit" class="btn btn-primary bg-138597 archive_button" value="Archiver"/>

                        </form>
                        <?php
                    }
                    ?>
                    <?php if ($data['status'] === 'archived'|| $data['status'] === 'trash') { ?>
                        <form  class="margin-right15" method="post" action="index.php?action=adminNotification&notificationid=<?= $data["id"] ?>">

                            <input type="hidden" name="operation" value="unread"/>
                            <input type="submit" class="btn btn-primary bg-138597 unread_button" value="non lu"/>


                        </form>
                        <?php
                    }

                    if ($data['status'] === 'unread' || $data['status'] === 'archived' ) { ?>
                        <form class="margin-right15" method="post"
                              action="index.php?action=adminNotification&notificationid=<?= $data["id"] ?>">

                            <input type="hidden" name="operation" value="trash"/>
                            <input type="submit" class="btn btn-primary bg-138597" value="Corbeille"/>

                        </form>
                        <?php
                    }

                    if ($data['status'] === 'trash' && isset($_GET['status']) && $_GET['status'] === 'trash') {
                    ?>
                        <form method="post" action="index.php?action=adminNotification&notificationid=<?= $data["id"] ?>">

                            <input type="hidden" name="operation" value="delete"/>
                            <input type="submit" class="btn btn-primary bg-138597 delete_button" value="supprimer"/>


                        </form>
                    <?php } ?>
                </div>

            </div>

<?php
    }
    $notifications->closeCursor();

    ?>

</div>
