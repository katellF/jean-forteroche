<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>
    <p><a href="index.php?action=post&amp;id=<?= $_GET['postid'] ?>">Retour à l'article</a></p>
<?php

if (isset ($_POST) && !empty($_POST)) {
    ?>
    <h2>Signaler un Commentaire</h2>


    <p>Votre notification a bien été envoyée.</p>
    <p>Merci pour votre vigilance.</p>

<?php
} else {
    ?>
    <h2>Signaler un Commentaire</h2>

    <form action="index.php?action=notification&amp;commentid=<?= $comment['id']?>&amp;commentid=<?= $_GET['commentid'] ?> " method="post">
        <div>
            <label for="email">email</label><br/>
            <input type="email" id="email" name="email"/>
        </div>
        <div>
            <label for="reason">reason</label><br/>
            <select name="reason" id="reason">
                <option value="abuse">Inapproprie</option>
                <option value="insult">Insulte</option>
            </select>

        </div>
        <div>
            <label for="content">content</label><br/>
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>


<?php
}
?>