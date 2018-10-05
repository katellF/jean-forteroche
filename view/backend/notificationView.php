
<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>

<div class="container">
<p class="margin-top50 margin-bottom25"><a class="btn btn-primary" href="index.php?action=admin">Retour au tableau de bord</a></p>

    <div class="margin-top25 margin-bottom25 text-center">
    <a class="margin-right15" href="index.php?action=adminNotification&status=all">Toutes</a>
    <a class="margin-right15" href="index.php?action=adminNotification&status=archived">Archivees</a>
    <a class="" href="index.php?action=adminNotification">non lu</a>
</div>

<h2 class="text-center">Notifications</h2>
<p class="text-center">Liste de notifications des commentaires </p>
<?php

while ($data = $notifications->fetch()){
    ?>
    <div class="text-center">
        <h3>
            <?= htmlspecialchars($data['content']) ?>
            <em class="font_size_60">le <?= $data['notification_date_fr'] ?></em>
        </h3>
    </div>
    <p class="text-center">statut: <?=$data['status']?></p>
<div class="d-flex justify-content-center">
    <?php if($data['status']=== 'unread' ){?>
        <form  class="margin-right15" method="post" action="index.php?action=adminNotification&notificationid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="archived"/>
            <input type="submit" class="btn btn-primary" value="Archiver"/>


        </form>
        <?php
    }
    ?>
    <?php if($data['status']=== 'archived' ){?>
        <form method="post" action="index.php?action=adminNotification&notificationid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="unread"/>
            <input type="submit" class="btn btn-primary" value="non lu"/>


        </form>
        <?php
    }
    ?>
    <form method="post" action="index.php?action=adminNotification&notificationid=<?=$data["id"]?>">


        <input type="hidden" name="operation" value="delete"/>
        <input type="submit" class="btn btn-primary" value="supprimer"/>


    </form>
</div>
    <?php
}
$notifications->closeCursor();

?>

</div>
