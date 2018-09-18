<?php
session_start();
$this->title = htmlspecialchars('Se connecter');
?>

<div class="container connect">

<h2 class="text-center">Se connecter</h2>


<form action="index.php?action=connection" method="post" class="form-connect">
    <div class="form-group">
        <label for="pseudo">pseudo</label><br/>
        <input type="text" class="form-control" id="pseudoConnect" placeholder="pseudo" name="pseudoConnect">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="passwordConnect" placeholder="Password" name="passwordConnect">
    </div>
    <div>
        <input type="submit" class="btn btn-primary" value="se connecter"/>
    </div>
</form>

</div>
