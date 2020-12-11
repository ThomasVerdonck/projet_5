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
}