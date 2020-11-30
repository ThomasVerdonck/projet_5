<?php
function getBdd(){
	try
	{
	    $bdd = new PDO('mysql:host=localhost:3308;dbname=projet5;charset=utf8', 'root', 'root');
	    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}

function getFilms($filmGenre)
{
    $bdd = getBdd();
    $result = $bdd->prepare('SELECT titre, descriptif FROM films WHERE genre=? ORDER BY date_creation DESC LIMIT 0, 5 ');
    $result->execute(array($filmGenre));
    return $result;

}

