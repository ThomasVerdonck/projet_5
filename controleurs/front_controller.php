<?php
require_once('modele/PostManager.php');

function lastPosts(){
	$postManager = new PostManager();
    $lastPosts = $postManager->getLastPosts();
	require('vue/accueil.php');
}

function posts($sous_categorie, $categorie){
    $postManager = new PostManager();
    $posts = $postManager->getPosts($sous_categorie, $categorie);    
    require('vue/sous_categories.php');
}

function post($id){
    $postManager = new PostManager();
    $post = $postManager->getPost($id);
    $comments = $postManager->getComments($id);
    require('vue/postView.php');
}

