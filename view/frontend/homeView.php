<?php $this->title = 'Accueil';

?>
<div class="text-center title_Accueil ">

    <h1 class="font_size_3">Billet Simple Pour L'alaska</h1>
    <p class="font_size_1_5 color_343a40">Découvrez le nouveau livre de Jean Forteroche</p>

    <a href="index.php?action=listPosts"class="text-center">Découvrez le livre</a>
    <a href="index.php?action=lastPost"class="text-center">Dernier chapitre</a>

</div>

  <h2 class="text-center ligne_top ligne_bottom">L'Auteur</h2>
<div class="container">

<p>Jean de Forteroche est né le 14 Juillet 1972 à Paris.Il a grandit dans le quartier populaire de Paris.
    Il rêvait de voyage et d'aventures et passait son temps à inventer des histoires."Lorem ipsum dolor sit amet, consectetur adipiscing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

    <strong class="italic row no-gutters justify-content-end">
        <a href="index.php?action=post&amp;id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-info btn-sm active button_list" role="button" aria-pressed="true">
            En savoir plus
        </a>
        </strong>

<!--    L'auteur (extrait), ses romans les plus celebres -->


</div>

<h2 class="text-center ligne_top ligne_bottom">Ses Best Sellers</h2>
<div class="container">

    <p>Loin dans le désert</p>
    <p>Pas Si Loin Que ça</p>
    <p>L'Afrique</p>
    <p>Un Puits sans eau</p>
</div>


    <!--    L'auteur (extrait), ses romans les plus celebres -

