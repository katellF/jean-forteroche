<div class="margin-top25">
<a href="index.php?action=adminNotification&status=all">Toutes</a>
<a href="index.php?action=adminNotification&status=archived">Archivees</a>
<a href="index.php?action=adminNotification">non lu</a>
</div>
<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>

<h2>Notifications</h2>
<p>Liste de notifications des commentaires </p>
<?php

//var_dump($comments->fetchAll());



while ($data = $notifications->fetch()) {


    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['content']) ?>
            <em class="font_size_60">le <?= $data['notification_date_fr'] ?></em>
        </h3>
    </div>
    <p>statut: <?=$data['status']?></p>
<div class="d-flex">
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


