<?php
require('modele/model.php');

function lastPosts(){
	$lastPosts = getLastPosts();
	require('vue/accueil.php');
}

function posts($genre){
    $posts = getPosts($genre);    
    require('vue/sous_categories.php');
}

