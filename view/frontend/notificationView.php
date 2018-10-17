<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>

<div class="min_height">
    <p class="margin-top50 margin-bottom25 margin-left15"><a href="index.php?action=post&amp;id=<?= $_GET['postid'] ?>" class="btn btn-primary bg-6BC3D1">Retour à l'article</a></p>
<?php

if (isset ($_POST) && !empty($_POST)) {
    ?>
    <div class="container margin-top50 text-center border_notif">
    <h1 class="margin-bottom25">Notification Envoyée</h1>
        <p>Votre commentaire a bien été signalé.</p>
        <p>Merci pour votre vigilance.</p>
    </div>
<?php
} else {
    ?>
    <div class="container margin-top50">
    <h1 class="margin-bottom50 text-center">Signaler un Commentaire</h1>

    <form action="index.php?action=notification&amp;commentid=<?= $_GET['commentid']?>&amp;postid=<?= $_GET['postid'] ?>" method="post">
        <div class="form-group margin-bottom25">
            <label for="email" class="margin-bottom15">Email</label><br/>
            <input type="email" class="form-control" id="email" name="email"/>
        </div>
        <div class="form-group margin-bottom25">
            <label for="reason" class="margin-bottom15">Cause</label><br/>
            <select name="reason" id="reason" class="form-control">
                <option value="abuse">Inapproprié</option>
                <option value="insult">Insultant</option>
                <option value="insult">Obscène</option>
                <option value="insult">Autres</option>
            </select>
        </div>
        <div class="form-group margin-bottom25">
            <label for="content" class="margin-bottom15">Vos remarques</label><br/>
            <textarea id="content"  class="form-control" name="content"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary bg-138597 margin-top15" value="Envoyer"/>
        </div>
    </form>
    </div>


<?php
}
?>
</div>
