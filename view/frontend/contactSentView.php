
<?php
$this->title = htmlspecialchars('Envoyer un commentaire');
?>
<div class="position-relative" id="content">
    <div class="min_height">
        <p class="margin-top50 margin-bottom25 margin-left15"><a href="index.php?action=post&amp;postid=<?= $_GET['postid'] ?>" class="btn btn-primary bg-6BC3D1">Retour à l'article</a></p>

        <div class="container margin-top50 text-center border_notif">
            <h1 class="margin-bottom25">Message Envoyé</h1>
            <p>L'auteur a bien reçu votre message.</p>
            <p>Merci pour votre compréhension.</p>
        </div>
    </div>
</div>
