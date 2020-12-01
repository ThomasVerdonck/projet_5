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

function getLastPosts()
{
    $bdd = getBdd();
    $result = $bdd->query('SELECT articles.titre, articles.descriptif
					 		FROM categories
							LEFT JOIN articles
							ON articles.id_categorie = categories.id ORDER BY date_creation DESC LIMIT 0, 3 ');
	return $result;
}

function getPosts($genre)
{
    $bdd = getBdd();
    $result = $bdd->prepare('SELECT articles.titre, articles.descriptif, sous_categories.nom_genre, articles.id_categorie 
    						 FROM articles
    						 LEFT JOIN sous_categories
    						 ON sous_categories.id = articles.id_genre
    						 WHERE nom_genre = ? ORDER BY date_creation ');
    $result->execute(array($genre));
    return $result;

}


