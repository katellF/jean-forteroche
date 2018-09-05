<?php
$this->title = htmlspecialchars('Se connecter');
?>

<h2>S'enregistrer</h2>

    <form action="index.php?action=register" method="post">
        <div>
            <label for="lastname">nom</label><br/>
            <input type="text"id="lastname" name="lastname"/>
        </div>
        <div>
            <label for="firstname">prénom</label><br/>
            <input type="text"id="firstname" name="firstname"/>
        </div>
        <div>
            <label for="pseudo">pseudo</label><br/>
            <input type="text"id="pseudo" name="pseudo"/>
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
            <label for="confirmPassword"> confirmer le mot de passe</label><br/>
            <input type="password" id="confirmPassword" name="confirmPassword"/>
        </div>
        <div>
            <input type="submit" value="s'enregistrer"/>
        </div>
    </form>

<h2>Se connecter</h2>

<form action="index.php?action=connection" method="post">
    <div>
        <label for="pseudo">pseudo</label><br/>
        <input type="text"id="pseudoConnect" name="pseudoConnect"/>
    </div>
    <div>
        <label for="password">mot de passe</label><br/>
        <input type="password" id="passwordConnect" name="passwordConnect"/>
    </div>
    <div>
        <input type="submit" value="se connecter"/>
    </div>
</form>
