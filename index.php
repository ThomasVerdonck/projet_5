<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once('controleurs/FrontController.php');
require_once('controleurs/BackController.php');
require_once('controleurs/CommentController.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'lastPosts':
            $frontController = new FrontController();
            $frontController->lastPosts();
            break;

        case 'tous_les_films':
            $categorie = "Films";
            $postsByPage = 10;
            if (isset($_GET['page']) AND !empty($_GET['page'])){
            $pageActuelle = intval($_GET['page']);
            }
            else{
                $pageActuelle = 1;
            }        
            $firstPost=($pageActuelle-1)*$postsByPage;
            $frontController = new FrontController();
            $frontController->allPosts($categorie, $firstPost, $postsByPage);
            break;

        case 'films_historique':
            $sous_categorie = "Historique";
            $categorie = "Films";            
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'films_science_fiction':
            $sous_categorie = "Science-fiction";
            $categorie = "Films";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'films_drame':
            $sous_categorie = "Drame";
            $categorie = "Films";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'films_espionnage':
            $sous_categorie = "Espionnage";
            $categorie = "Films";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'films_thriller':
            $sous_categorie = "Thriller";
            $categorie = "Films";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'tous_les_docus':
            $categorie = "Docus";
            $postsByPage = 10;
            if (isset($_GET['page']) AND !empty($_GET['page'])){
            $pageActuelle = intval($_GET['page']);
            }
            else{
                $pageActuelle = 1;
            }        
            $firstPost=($pageActuelle-1)*$postsByPage;
            $frontController = new FrontController();
            $frontController->allPosts($categorie, $firstPost, $postsByPage);
            break;

        case 'docus_histoire':
            $sous_categorie = "Histoire";
            $categorie = "Docus";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'docus_sante':
            $sous_categorie = "Santé";
            $categorie = "Docus";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'docus_science':
            $sous_categorie = "Science";
            $categorie = "Docus";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'docus_propagande':
            $sous_categorie = "Propagande";
            $categorie = "Docus";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'docus_révélations':
            $sous_categorie = "Révélations";
            $categorie = "Docus";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'tous_les_livres':
            $categorie = "Livres";
            $postsByPage = 10;
            if (isset($_GET['page']) AND !empty($_GET['page'])){
            $pageActuelle = intval($_GET['page']);
            }
            else{
                $pageActuelle = 1;
            }        
            $firstPost=($pageActuelle-1)*$postsByPage;
            $frontController = new FrontController();
            $frontController->allPosts($categorie, $firstPost, $postsByPage);
            break;

        case 'livres_histoire':
            $sous_categorie = "Histoire";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'livres_sociologie':
            $sous_categorie = "Sociologie";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'livres_sciences_interdites':
            $sous_categorie = "Sciences interdites";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'livres_sante':
            $sous_categorie = "Santé";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'livres_essais':
            $sous_categorie = "Essais";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'livres_révélations':
            $sous_categorie = "Révélations";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'livres_economie':
            $sous_categorie = "Economie";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;

        case 'livres_nature':
            $sous_categorie = "Nature";
            $categorie = "Livres";
            $frontController = new FrontController();
            $frontController->posts($sous_categorie, $categorie);
            break;


        case 'showPost':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = intval($_GET['id']);
                $frontController = new FrontController();
                $frontController->post($id);
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;

        case 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $commentController = new CommentController();
                    $commentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
    
        case 'connection':
            require('vue/connection.php');
            break;

        case 'log_in':
            $backController = new BackController();
            $backController->connectAdmin($_POST['pseudo'], $_POST['password']);
            break;

        case 'dashboard':
            if(isset($_SESSION['pseudo'])){
                require('vue/dashboard.php');
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'disconnect':
            $backController = new BackController();
            $backController->disconnect();
            break;

        case 'create_post':
            if(isset($_SESSION['pseudo'])){
                require('vue/create_post.php');
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'addPost':
            if(isset($_SESSION['pseudo'])){
                if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['cat']) && !empty($_POST['sous_cat'])) {
                $backController = new BackController();
                $backController->addPost($_POST['title'], $_POST['content'], $_POST['cat'], $_POST['sous_cat']);
                }
                else {
                        echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'listAllPostsAdmin':
            if(isset($_SESSION['pseudo'])){
                $backController = new BackController();
                $backController->allPostsAdmin();
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'suppPost':
            if(isset($_SESSION['pseudo'])){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    //alert('Etes-vous sûr de vouloir supprimer ce post?');
                    $id = $_GET['id'];
                    $backController = new BackController();
                    $backController->suppPost($id);
                }
                else{
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'modifPost':
            if(isset($_SESSION['pseudo'])){
                $id = intval($_GET['id']);                
                if (isset($_GET['id']) && $_GET['id'] > 0) {                    
                    $backController = new BackController();
                    $backController->modifPost($id);

                }
                else{
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'updatePost':
            if(isset($_SESSION['pseudo'])){
                    $id = intval($_POST['id']);
                    $backController = new BackController();
                    $backController->updatePost($id);              
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;
//Un commentaire est signalé
        case 'reportedComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $commentController = new CommentController();
                $commentController->reportedComment($id);
            }
            else{
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
//Récupération des commentaires signalés dans le TdB
        case 'manageComments':
            if(isset($_SESSION['pseudo'])){
                $commentController = new CommentController();
                $commentController->allReportedComments();
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'suppCom':
            if(isset($_SESSION['pseudo'])){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $commentController = new CommentController();
                    $commentController->suppCom($id);
                }
                else{
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'letCom':
            if(isset($_SESSION['pseudo'])){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $commentController = new CommentController();
                    $commentController->letCom($id);
                }
                else{
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;
        default:
            header("Location: http://localhost:83/projet_5/index.php?action=lastPosts");
    }   
}
else {
    $frontController = new FrontController();
    $frontController->lastPosts();
}


