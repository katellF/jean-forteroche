<?php
$this->title = htmlspecialchars('Notifier un commentaire');
?>

<h2>Signaler un Commentaire</h2>

    <form action="index.php?action=notification&amp;commentid=<?= $_GET['commentid'] ?>" method="post">
        <div>
            <label for="email">email</label><br/>
            <input type="email" id="email" name="email"/>
        </div>
        <div>
            <label for="reason">reason</label><br/>
            <input type="text"id="reason" name="reason"/>
        </div>
        <div>
            <label for="content">content</label><br/>
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>



