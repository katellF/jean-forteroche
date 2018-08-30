<?php $this->title = htmlspecialchars($post['title']);
session_start();
?>
<h2>Signaler une Notification</h2>

    <form action="index.php?action=addNotification&amp;id=<?= $data['id'] ?>" method="post">
        <div>
            <label for="email">email</label><br/>
            <input type="email" id="email" name="email"/>
        </div>
        <div>
            <label for="notification">Notification</label><br/>
            <textarea id="notification" name="notification"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>



