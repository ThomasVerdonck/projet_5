<?php
require('modele/model.php');

function accueil(){
    require('vue/accueil.php');
}

function films($genre){
    $films = getFilms($genre);    
    require('vue/accueil.php');
}