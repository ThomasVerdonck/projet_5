<?php
require_once('modele/ConnectionManager.php');
require_once('modele/CommentManager.php');

// Connexion
function connectAdmin($pseudo, $pass){
    $connectionManager = new ConnectionManager();
    $resultat = $connectionManager->recover($pseudo);
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($pass, $resultat['password']);   
    if ($isPasswordCorrect === false) {
        echo htmlspecialchars('Mauvais identifiant ou mot de passe !');
    }
    else {// Création des variables de session pour y stocker le pseudo de l'admin 
        $_SESSION['pseudo'] = $pseudo;
        require('vue/dashboard.php');// on affiche la vue TdB avec require
    }
}

//DECONNEXION:
// Suppression des variables de session
function disconnect(){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php?action=lastPosts");
}

function addPost($title, $content, $cat, $sousCat){
    $allowed = array("image/jpeg", "image/jpg", "image/gif", "image/png");
    $fileName = $_FILES['file']['name'];    
    $fileType = $_FILES['file']['type'];
    $tmpName = $_FILES['file']['tmp_name'];                    
    // Vérifie la taille du fichier - 5Mo maximum:
    $maxSize = 5 * 1024 * 1024;
    $fileSize = $_FILES['file']['size'];
    if($fileSize > $maxSize){
        echo "Erreur: La taille du fichier est supérieure à la limite autorisée.";
        die();
    }
    // Vérifie l'extension du fichier:
    if(in_array($fileType, $allowed)){
        move_uploaded_file($tmpName, 'public/images/'.$fileName);
        $connectionManager = new ConnectionManager();
        $addPost = $connectionManager->adminAddPost($title, $content, $cat, $sousCat, $fileName);
        if ($addPost === false) {
            die('Impossible d\'ajouter l\'article !');
        }
        else {
            header("Location: index.php?action=listAllPostsAdmin");
        }
    }
    else{
        echo "Erreur : Vous avez oublié un champ ou un format de fichier n'est pas valide.";
        die();
    }
    
}

function allPostsAdmin(){
    $connectionManager = new ConnectionManager();
    $allPostsAdmin = $connectionManager->getAllPostsAdmin();
    require('vue/allPostsAdmin.php');
}

function suppPost($id){
    $connectionManager = new ConnectionManager();
    $suppPost = $connectionManager->adminSuppPost($id);
    allPostsAdmin();
}

function pageModif($id){
    $connectionManager = new ConnectionManager();
    $pageModif = $connectionManager->pageModifPost($id);
    //$categorie = $connectionManager->getCategorie();
    require('vue/modify_post.php');
}

function updatePost($id){    
    if (isset($_FILES) && $_FILES['file']['error'] === 0) {
        $allowed = array("image/jpeg", "image/jpg", "image/gif", "image/png");        
        $fileName = $_FILES['file']['name'];    
        $fileType = $_FILES['file']['type'];
        $tmpName = $_FILES['file']['tmp_name'];
        // Vérifie la taille du fichier - 5Mo maximum:
        $maxSize = 5 * 1024 * 1024;
        $fileSize = $_FILES['file']['size'];
        if($fileSize > $maxSize){
            echo "Erreur: La taille du fichier est supérieure à la limite autorisée.";
            die();
        }
        if(in_array($fileType, $allowed)){
            move_uploaded_file($tmpName, 'public/images/'.$fileName);
            $connectionManager = new ConnectionManager();
            $updatePostWithPic = $connectionManager->updateAdminPostWithPic($id, $fileName);
            if ($updatePostWithPic === false) {
                    die('Impossible de mettre à jour l\'article !');
                }
                else {
                    header('Location: index.php?action=listAllPostsAdmin');
                }
            }
        else{
            echo "Erreur : Veuillez sélectionner un format de fichier valide.";
            die();
        }
    }
    elseif (isset($_FILES) && $_FILES['file']['error'] === 4) {
        $connectionManager = new ConnectionManager();
        $updatePost = $connectionManager->updateAdminPost($id);
        if ($updatePost === false) {
                die('Impossible de mettre à jour l\'article !');
        }
        else {
            header('Location: index.php?action=listAllPostsAdmin');
        }
    }    
}

function reportedComment($id){
    $commentManager = new CommentManager();
    $commentManager->reportedCom($id);
    header('Location: index.php?action=showPost&id=' . $_GET['postId']);    
}

function allReportedComments(){
    $commentManager = new CommentManager();
    $allReportedComments = $commentManager->getAllReportedComments();
    require('vue/reportedComments.php');
}

function suppCom($id){
    $commentManager = new CommentManager();
    $suppCom = $commentManager->adminSuppCom($id);
    header('Location: index.php?action=manageComments');
}

function letCom($id){
    $commentManager = new CommentManager();
    $letCom = $commentManager->adminLetCom($id);
    header('Location: index.php?action=manageComments');
}