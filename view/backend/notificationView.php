
<a href="index.php?action=adminNotification&status=all">Toutes</a>
<a href="index.php?action=adminNotification&status=archived">Archivees</a>
<a href="index.php?action=adminNotification">non lu</a>

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
            <em>le <?= $data['notification_date_fr'] ?></em>
        </h3>
    </div>
    <p>statut: <?=$data['status']?></p>

    <?php if($data['status']=== 'unread' ){?>
        <form method="post" action="index.php?action=adminNotification&notificationid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="archived"/>
            <input type="submit" value="Archiver"/>


        </form>
        <?php
    }
    ?>
    <?php if($data['status']=== 'archived' ){?>
        <form method="post" action="index.php?action=adminNotification&notificationid=<?=$data["id"]?>">

            <input type="hidden" name="operation" value="unread"/>
            <input type="submit" value="non lu"/>


        </form>
        <?php
    }
    ?>
    <form method="post" action="index.php?action=adminNotification&notificationid=<?=$data["id"]?>">


        <input type="hidden" name="operation" value="delete"/>
        <input type="submit" value="supprimer"/>


    </form>

    <?php
}
$notifications->closeCursor();

?>


