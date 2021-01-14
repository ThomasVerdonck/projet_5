<?php
namespace Controleurs;
use PDO;
//require_once('modele/PostManager.php');
//require_once('modele/CommentManager.php');
//require_once('modele/ConnectionManager.php');
use Model\PostManager;
use Model\CommentManager;
use Model\ConnectionManager;

class CommentController{
    public function addComment($postId, $author, $comment){
        $commentManager = new CommentManager();
        $commentAdded = $commentManager->postComment($postId, $author, $comment);
        if ($commentAdded === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=showPost&id=' . $postId);
        }
    }

    //Un visiteur signale un commentaire -> Mise à jour BDD et affichage du com' ds le TdB
    public function reportedComment($id){
        $commentManager = new CommentManager();
        $commentManager->reportedCom($id);
        header('Location: index.php?action=showPost&id=' . $_GET['postId']);    
    }

    public function allReportedComments(){
        $commentManager = new CommentManager();
        $allReportedComments = $commentManager->getAllReportedComments();
        require('vue/reportedComments.php');
    }

    public function suppCom($id){
        $commentManager = new CommentManager();
        $suppCom = $commentManager->adminSuppCom($id);
        header('Location: index.php?action=manageComments');
    }

    public function letCom($id){
        $commentManager = new CommentManager();
        $letCom = $commentManager->adminLetCom($id);
        header('Location: index.php?action=manageComments');
    }
}