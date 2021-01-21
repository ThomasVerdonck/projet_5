<?php
namespace Controleurs;
use Model\PostManager as PostManager;
use Model\CommentManager as CommentManager;

class FrontController{
    public function lastPosts(){
    	$postManager = new PostManager();
        $lastPosts = $postManager->getLastPosts();
        $presentationText = $postManager->getPresentationText();
    	require('vue/accueil.php');
    }

    public function allPosts($categorie, $firstPost, $postsByPage){
        $postManager = new PostManager();
        $postsTotal = $postManager->countAllPosts($categorie);
        $pagesTotal = ceil($postsTotal[0]/$postsByPage);

        $allPosts = $postManager->getAllPosts($categorie, $firstPost, $postsByPage);
        require('vue/categories.php');
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

    public function presentationText(){
        $postManager = new PostManager();
        $presentationText = $postManager->getPresentationText();
    }
}


