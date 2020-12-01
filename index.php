<?php
require_once('controleurs/front_controller.php');

if (isset($_GET['action'])) {    
    switch ($_GET['action']) {
           case 'lastPosts':
                lastPosts();
                break;

            case 'films_historiques':
                $genre = $_GET['action'];
                posts($genre);
                break;
           
           default:
               # code...
               break;
       }   
}
else {
    lastPosts();
}



