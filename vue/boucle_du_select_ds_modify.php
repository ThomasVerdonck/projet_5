<?php 
    for ($i=0; $i < $categorie[0]; $i++) { 
        if ($categorie[0][$i] === $categorie['nom_categorie']) {
            echo '<option value="'.$categorie[0][$i]["id"].'" selected>'.$categorie[0][$i]["nom_categorie"].'</option>';
        } else {
            echo '<option value="'.$categorie[0][$i]["id"].'">'.$categorie[0][$i]["nom_categorie"].'</option>';
        }
        
    }
?>