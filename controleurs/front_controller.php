<?php
require('modele/PostManager.php');

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

