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
        $postsByPage = 6;      
        $posts = $postManager->getPosts($sous_categorie, $categorie);        
        $getPostsTotal = $postManager->getPostsTotal($sous_categorie, $categorie);

        $postsTotal = $getPostsTotal->rowCount();

        $pagesTotal = ceil($postsTotal/$postsByPage);
        
        if (isset($_GET['page']) AND !empty($_GET['page'])){
            $pageActuelle = intval($_GET['page']);
        }
        else{
            $pageActuelle = 1;
        }

        $firstPost=($pageActuelle-1)*$postsByPage;

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


