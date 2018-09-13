<?php
session_start();
$this->title = htmlspecialchars('Se connecter');
?>



<!--    <form action="index.php?action=register" method="post">-->
<!--        <div>-->
<!--            <label for="lastname">nom</label><br/>-->
<!--            <input type="text"id="lastname" name="lastname"/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="firstname">prénom</label><br/>-->
<!--            <input type="text"id="firstname" name="firstname"/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="pseudo">pseudo</label><br/>-->
<!--            <input type="text"id="pseudo" name="pseudo"/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="email">email</label><br/>-->
<!--            <input type="email" id="email" name="email"/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="password">mot de passe</label><br/>-->
<!--            <input type="password" id="password" name="password"/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="confirmPassword"> confirmer le mot de passe</label><br/>-->
<!--            <input type="password" id="confirmPassword" name="confirmPassword"/>-->
<!--        </div>-->
<!--        <div>-->
<!--            <input type="submit" value="s'enregistrer"/>-->
<!--        </div>-->
<!--    </form>-->
<!--<div class="container">-->
<!--    <h2>S'enregistrer</h2>-->
<!--<form action="index.php?action=register" method="post">-->
<!--    <div class="form-group">-->
<!--        <label for="lastname">Nom</label>-->
<!--        <input type="text" class="form-control" id="lastname" placeholder="nom" name="lastname">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="firstname">Prénom</label>-->
<!--        <input type="text" class="form-control" id="firstname" placeholder="prenom" name="firstname">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="pseudo">pseudo</label><br/>-->
<!--        <input type="text" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo"/>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="email"> Adresse Email</label>-->
<!--        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">-->
<!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="password">Mot de passe</label>-->
<!--        <input type="password" class="form-control" id="password" placeholder="Password" name="password">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="confirmPassword">Confirmer le Mot de Passe</label>-->
<!--        <input type="password" class="form-control" id="confirmPassword" placeholder="Password" name="confirmPassword">-->
<!--    </div>-->
<!---->
<!--   <button type="submit" class="btn btn-primary">S'enregistrer</button>-->
<!---->
<!--</form>-->
<!--</div>-->

<div class="container">

<h2>Se connecter</h2>


<form action="index.php?action=connection" method="post">
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
<!--<form action="index.php?action=connection" method="post">-->
<!--    <div>-->
<!--        <label for="pseudo">pseudo</label><br/>-->
<!--        <input type="text"id="pseudoConnect" name="pseudoConnect"/>-->
<!--    </div>-->
<!--    <div>-->
<!--        <label for="password">mot de passe</label><br/>-->
<!--        <input type="password" id="passwordConnect" name="passwordConnect"/>-->
<!--    </div>-->
<!--    <div>-->
<!--        <input type="submit" value="se connecter"/>-->
<!--    </div>-->
<!--</form>-->
