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


