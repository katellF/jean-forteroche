<?php
session_start();

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo 'Bonjour ' . $_SESSION['pseudo'];
        }
?>

<form method="post" action="index.php?action=logout">

    <p>
      <input type="hidden" name="operation" value="logout"/>
        <input type="submit" value="Se déconnecter"/>
    </p>

</form>