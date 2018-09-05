<?php
$this->title = htmlspecialchars('Se connecter');
?>

<h2>S'enregistrer</h2>

    <form action="index.php?action=register" method="post">
        <div>
            <label for="name">nom</label><br/>
            <input type="text"id="name" name="name"/>
        </div>
        <div>
            <label for="firstname">prénom</label><br/>
            <input type="text"id="name" name="name"/>
        </div>
        <div>
            <label for="pseudo">pseudo</label><br/>
            <input type="text"id="name" name="name"/>
        </div>
        <div>
            <label for="email">email</label><br/>
            <input type="email" id="email" name="email"/>
        </div>

        <div>
            <label for="password">mot de passe</label><br/>
            <input type="password" id="password" name="password"/>
        </div>
        <div>
            <input type="submit" value="s'enregistrer"/>
        </div>
    </form>

<h2>Se connecter</h2>

<form action="index.php?action=register" method="post">
    <div>
        <label for="pseudo">pseudo</label><br/>
        <input type="text"id="name" name="name"/>
    </div>
    <div>
        <label for="password">mot de passe</label><br/>
        <input type="password" id="password" name="password"/>
    </div>
    <div>
        <input type="submit" value="se connecter"/>
    </div>
</form>
