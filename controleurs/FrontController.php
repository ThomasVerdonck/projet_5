<?php
require_once('modele/PostManager.php');
require_once('modele/CommentManager.php');

class FrontController{
    public function lastPosts(){
    	$postManager = new PostManager();
        $lastPosts = $postManager->getLastPosts();
    	require('vue/accueil.php');
    }

    public function allPosts($categorie, $firstPost, $postsByPage){
        $postManager = new PostManager();
        $postsTotal = $postManager->countAllPosts($categorie);        
        
        $pagesTotal = ceil($postsTotal[0]/$postsByPage);

        $allPosts = $postManager->getAllPosts($categorie, $firstPost, $postsByPage);
        require('vue/categories.php');
    }

    public function posts($sous_categorie, $categorie, $firstPost, $postsByPage){
        $postManager = new PostManager();
        $postsTotal = $postManager->countPosts($sous_categorie, $categorie);        
        
        $pagesTotal = ceil($postsTotal[0]/$postsByPage);

        $posts = $postManager->getPosts($sous_categorie, $categorie, $firstPost, $postsByPage);
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


