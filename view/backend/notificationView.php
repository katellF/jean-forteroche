<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>

<div class="container relative ">
    <p class="margin-top50 margin-bottom25"><a class="btn btn-primary bg-6BC3D1" href="index.php?action=admin">Retour au
            tableau de bord</a></p>

    <div class="margin-top25 margin-bottom25 text-center">
        <a class="margin-right15 color_white" href="index.php?action=adminNotification&status=all">Toutes</a>
        <a class="margin-right15 color_white" href="index.php?action=adminNotification&status=archived">Archivees</a>
        <a class="color_white" href="index.php?action=adminNotification">non lu</a>
    </div>

    <h2 class="text-center margin-bottom25">Notifications</h2>
    <h3 class="text-center">Liste de notifications des commentaires : </h3>
    <?php

    while ($data = $notifications->fetch()) {
        ?>
        <div class="d-flex justify-content-center">
          <div class="col"></div>
            <div class="col">
            <h4>
                raison : <?= htmlspecialchars($data['reason']) ?> <br/>
                <em class="font_size_60">le <?= $data['notification_date_fr'] ?></em>
            </h4>
            <p class="color-138597"><strong>statut: <?= $data['status'] ?></strong></p>
            <p> signalement : <?= htmlspecialchars($data['content']) ?> </p>
        </div>
        </div>


        <div class="d-flex flex-column relative align-items-end button-notif">

            <?php if ($data['status'] === 'unread') { ?>
                <form class=" margin-right15 margin-bottom15" method="post" action="index.php?action=adminNotification&notificationid=<?= $data["id"] ?>">

                    <input type="hidden" name="operation" value="archived"/>
                    <input type="submit" class="btn btn-primary bg-138597" value="Archiver"/>

                </form>
                <?php
            }
            ?>
<!--            pas logique a reprendre-->
            <?php if ($data['status'] === 'archived') { ?>
                <form method="post" action="index.php?action=adminNotification&notificationid=<?= $data["id"] ?>">

                    <input type="hidden" name="operation" value="unread"/>
                    <input type="submit" class="btn btn-primary" value="non lu"/>


                </form>
                <?php
            }
            ?>
            <form method="post" action="index.php?action=adminNotification&notificationid=<?= $data["id"] ?>">


                <input type="hidden" name="operation" value="delete"/>
                <input type="submit" class="btn btn-primary bg-138597" value="supprimer"/>


            </form>
        </div>

        <?php
    }
    $notifications->closeCursor();

    ?>

</div>
