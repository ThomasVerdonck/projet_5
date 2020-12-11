<?php
class Manager
{
    protected function getBdd(){
        try{
            $bdd = new PDO('mysql:host=localhost:3308;dbname=projet5;charset=utf8', 'root', 'root');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
    }
}