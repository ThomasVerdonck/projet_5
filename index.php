<?php
session_start();
require_once('controleurs/front_controller.php');
require_once('controleurs/back_controller.php');

if (isset($_GET['action'])) {    
    switch ($_GET['action']) {
        case 'lastPosts':
            lastPosts();
            break;

        case 'Historique':
            $sous_categorie = $_GET['action'];
            $categorie = "Films";
            posts($sous_categorie, $categorie);
            break;

        case 'films_science_fiction':
            $sous_categorie = "Science-fiction";
            $categorie = "Films";
            posts($sous_categorie, $categorie);
            break;

        case 'films_drame':
            $sous_categorie = "Drame";
            $categorie = "Films";
            posts($sous_categorie, $categorie);
            break;

        case 'films_espionnage':
            $sous_categorie = "Espionnage";
            $categorie = "Films";
            posts($sous_categorie, $categorie);
            break;

        case 'films_thriller':
            $sous_categorie = "Thriller";
            $categorie = "Films";
            posts($sous_categorie, $categorie);
            break;

        case 'docus_histoire':
            $sous_categorie = "Histoire";
            $categorie = "Docus";
            posts($sous_categorie, $categorie);
            break;

        case 'docus_sante':
            $sous_categorie = "Santé";
            $categorie = "Docus";
            posts($sous_categorie, $categorie);
            break;

        case 'docus_science':
            $sous_categorie = "Science";
            $categorie = "Docus";
            posts($sous_categorie, $categorie);
            break;

        case 'docus_propagande':
            $sous_categorie = "Propagande";
            $categorie = "Docus";
            posts($sous_categorie, $categorie);
            break;

        case 'docus_révélations':
            $sous_categorie = "Révélations";
            $categorie = "Docus";
            posts($sous_categorie, $categorie);
            break;

        case 'series_science_fiction':
            $sous_categorie = "Science-fiction";
            $categorie = "Séries";
            posts($sous_categorie, $categorie);
            break;

        case 'series_drame':
            $sous_categorie = "Drame";
            $categorie = "Séries";
            posts($sous_categorie, $categorie);
            break;

        case 'series_espionnage':
            $sous_categorie = "Espionnage";
            $categorie = "Séries";
            posts($sous_categorie, $categorie);
            break;

        case 'livres_histoire':
            $sous_categorie = "Histoire";
            $categorie = "Livres";
            posts($sous_categorie, $categorie);
            break;

        case 'livres_sociologie':
            $sous_categorie = "Sociologie";
            $categorie = "Livres";
            posts($sous_categorie, $categorie);
            break;

        case 'livres_sciences_interdites':
            $sous_categorie = "Sciences interdites";
            $categorie = "Livres";
            posts($sous_categorie, $categorie);
            break;

        case 'livres_sante':
            $sous_categorie = "Santé";
            $categorie = "Livres";
            posts($sous_categorie, $categorie);
            break;

        case 'livres_essais':
            $sous_categorie = "Essais";
            $categorie = "Livres";
            posts($sous_categorie, $categorie);
            break;


        case 'showPost':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = intval($_GET['id']);
                post($id);
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break; 
    
        case 'connection':
            require('vue/connection.php');
            break;

        case 'log_in':
            connectAdmin($_POST['pseudo'], $_POST['password']);
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
            disconnect();
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
                if (!empty($_POST['title']) && !empty($_POST['content']) 
                    && !empty($_POST['cat']) && !empty($_POST['sous_cat'])) {
                    addPost($_POST['title'], $_POST['content'], $_POST['cat'], $_POST['sous_cat']);
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
                allPostsAdmin();
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'suppPost':
            if(isset($_SESSION['pseudo'])){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    suppPost($id);
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
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    modifPost($id);
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
                $id = $_POST['id'];
                updatePost($id);
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;

        case 'getReportedComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                reportedComment($id);
            }
            else{
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;

        case 'manageComments':
            if(isset($_SESSION['pseudo'])){
                allReportedComments();
            }
            else{
                echo "Vous n'avez pas le droit d'accéder à cette page.";
            }
            break;
    }   
}
else {
    lastPosts();
}


