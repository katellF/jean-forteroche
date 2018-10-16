<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>
    <p class="margin-top25 margin-bottom25"><a href="index.php?action=post&amp;id=<?= $_GET['postid'] ?>">Retour à l'article</a></p>
<?php

if (isset ($_POST) && !empty($_POST)) {
    ?>
    <h2>Signaler un Commentaire</h2>


    <p>Votre notification a bien été envoyée.</p>
    <p>Merci pour votre vigilance.</p>

<?php
} else {
    ?>
    <div class="container">
    <h2>Signaler un Commentaire</h2>

    <form action="index.php?action=notification&amp;commentid=<?= $_GET['commentid'] ?>" method="post">
        <div class="form-group">
            <label for="email">email</label><br/>
            <input type="email" class="form-control" id="email" name="email"/>
        </div>
        <div>
            <label for="reason">reason</label><br/>
            <select name="reason" id="reason" class="form-control">
                <option value="abuse">Inapproprie</option>
                <option value="insult">Insulte</option>
            </select>

        </div>
        <div class="form-group">
            <label for="content">content</label><br/>
            <textarea id="content"  class="form-control" name="content"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Envoyer"/>
        </div>
    </form>
    </div>


<?php
}
?>