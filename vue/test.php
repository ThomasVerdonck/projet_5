
<section>
    <article>
 
    <?php
 
     
                 ////////////PAGINATION AUTO////////////////
                $nb_billet_page= 2; // nombre de billet par page
 
                    // on recupere le nombre de billet
                $req=$bdd->prepare('SELECT COUNT (*) AS nb_billet FROM billets');
                $donnees=$req->fetch();
                $nb_billet= $donnees['nb_billet'];
 
                $nb_page= ceil($nb_billet/$nb_billet_page);//calcul du nombre de page
 
 
                if (isset ($_GET['page'])) // si la variable $_GET['page'] existe , donc si on a cliqué sur un n° de page...
                {
                    $pageActuelle=intval($_GET['page']); // cela veut dire que nous sommes sur la page actuelle
                     
                    if ($pageActuelle>=$nb_page) // *****Si la valeur de $pageActuelle (le numéro de la page) est plus grande ou égale à $nombreDePage...
                    {
                        $pageActuelle=$nb_page;
                    }
                }
 
                else // sinon-> si aucune page n'est sélectionnée et que nous ne sommes pas sur la dernière page...
                {
                    $pageActuelle=1; // nous sommes donc sur la première page.
                }
 
 
                $req->closeCursor();
 
 
 
                //affichage des billets
                //on sait que les plages LIMIT démarrent après le premier nombre indiqué, il faut donc faire le calcul suivant:
                //$pageActuelle=1 (si nous sommes sur le 1ere page) : $pageActuelle-1 = 0 , 0*2 = 0 => sur la premiere page nous lisons donc les billets à partir du billets 0 soit le premier...
                //$pageActuelle=2 (si nous sommes sur la deuxième page) : $pageActuelle-1 = 1 , 1*2 = 2 => sur la deuxième page nous lisons donc les billets après le billet 2 soit le troisième...
 
                $premierbillet=($pageActuelle-1)*$nb_billet_page; // calcul du premier billet à lire.
 
                // On récupère les billets
                $req=$bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh/%imin/%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT '.$premierbillet.','.$nb_billet_page.'');
 
 
 
                // On affiche le contenu du billet
                    while ($donnees=$req->fetch())
                        {
                             echo '<p><h3>' .htmlspecialchars($donnees['titre']) . ' le ' . htmlspecialchars($donnees['date_creation_fr']) .'</h3>'. htmlspecialchars($donnees['contenu']).'</p>';
    ?>
                             <a href="commentaires.php?billet=<?php echo $donnees['id'];?>"><em>Commentaires</em></a><br/>
 
    <?php
 
                        }
 
 
                    // Fin de la boucle des billets
                 $req->closeCursor();
 
    ?>
 
                <em>Pages : </em>
    <?php
                //Affichage des pages
                for ($i=1; $i <= $nb_page ; $i++)
                {
                    if ($i==$pageActuelle)
                    {
                        echo '['. $i .']';
                    }
 
                    else
                    {
                         echo '<a href="index.php?page='.$i.'">'.$i.'</a> ';
                    }
                }
 
 
    ?>
         
     </article>    
</section>