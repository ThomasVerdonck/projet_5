<?php
require_once('controleurs/front_controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accueil') {
        require('vue/accueil.php');
    }
    elseif ($_GET['action'] == 'films') {
        require('vue/films.php');
    }
    elseif ($_GET['action'] == 'historique') {
        $genre = $_GET['action'];
        films($genre);        
    }     
}
else {
    require('vue/accueil.php');
}



		