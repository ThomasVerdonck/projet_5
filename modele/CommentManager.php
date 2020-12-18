<?php
require_once("Manager.php");

class CommentManager extends Manager
{
    // QUAND LE VISITEUR SIGNALE UN COMMENTAIRE
    public function reportedCom($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE commentaires SET signalements = 1 WHERE id = ?');
        $reponse->execute(array($id));
        return $reponse;
    }

    // AFFICHER LES COMMENTAIRES SIGNALES
    public function getAllReportedComments(){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT * FROM commentaires WHERE signalements > 0');
        $allReportedComments = $reponse->execute();
        return $reponse;
    }
    
    // SUPPRIMER UN COMMENTAIRE SIGNALE
    public function adminSuppCom($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
        $reponse->execute(array($id));
        $resultat = $reponse->fetch();
        return $resultat;
    }
    
    // REMETTRE LE COMMENTAIRE SIGNALE
    public function adminLetCom($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE commentaires SET signalements = 0 WHERE id = ?');
        $reponse->execute(array($id));
        return $reponse;
    }
}