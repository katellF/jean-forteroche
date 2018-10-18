<?php

//session_start();
$this->title = htmlspecialchars('Changer son mot de passe');
?>

<p class="margin-top50 margin-bottom25 margin-left15"><a class="btn btn-primary bg-6BC3D1"
                                                         href="index.php?action=admin">Retour au tableau de bord</a></p>


<div class="container connect">

    <h2 class="text-center">Changer le mot de passe</h2>


    <form action="index.php?action=connection" method="post" class="form-connect">
        <div class="form-group margin-bottom15">
            <label for="pseudo">pseudo</label><br/>
            <strong class="font-weight-bold"><?=$_SESSION['pseudo']?></strong>
<!--            <input type="text" class="form-control" id="pseudoConnect" placeholder="pseudo" name="pseudoConnect">-->
       </div>
        <div class="form-group margin-bottom25">
            <label for="password" class="margin-bottom15">Mot de passe</label>
            <input type="password" class="form-control" id="passwordConnect" placeholder="Password" name="passwordConnect">
        </div>
        <div>
            <input type="submit" class="btn btn-primary btn-lg btn-block active button-form button-change-pass" value="Modifier"/>
        </div>
    </form>

</div>