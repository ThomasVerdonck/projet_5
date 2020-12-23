<?php
require_once('modele/PostManager.php');
require_once('modele/CommentManager.php');

class FrontController{
    public function lastPosts(){
    	$postManager = new PostManager();
        $lastPosts = $postManager->getLastPosts();
    	require('vue/accueil.php');
    }

    public function posts($sous_categorie, $categorie){
        $postManager = new PostManager();
        /*$nbPostsPage = 2;
        $nbPosts = $postManager->nbPosts();      
        $nbPages = ceil($nbPosts/$nbPostsPage);
        if (isset ($_GET['page'])){
            $pageActuelle=intval($_GET['page']);
            if ($pageActuelle>=$nbPages){
                $pageActuelle=$nbPages;
            }
        }
        else{
            $pageActuelle=1;
        }
        $firstPost=($pageActuelle-1)*$nbPostsPage;*/
        $posts = $postManager->getPosts($sous_categorie, $categorie);
        require('vue/sous_categories.php');
    }

    public function post($id){
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($id);
        $comments = $commentManager->getComments($id);
        require('vue/postView.php');
    }
}


