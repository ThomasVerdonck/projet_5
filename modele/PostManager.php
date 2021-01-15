<?php
//require_once("Manager.php");
namespace Model;
use Model\Manager;

class PostManager extends Manager
{
	public function getLastPosts(){
	    $bdd = $this->getBdd();
	    $result = $bdd->query('SELECT titre, auteur, descriptif, image
						 		FROM articles ORDER BY date_creation DESC LIMIT 0, 5 ');
		return $result;
	}

	public function countAllPosts($categorie){
		$bdd = $this->getBdd();
		$result = $bdd->prepare('SELECT COUNT(articles.id) AS nb_posts FROM articles 
	    						 LEFT JOIN categories
	    						 ON categories.id = articles.id_categorie
	    						 LEFT JOIN sous_categories
	    						 ON sous_categories.id = articles.id_sous_categorie
	    						 WHERE nom_categorie = ?');
    	$result->execute(array($categorie));
    	$postsTotal = $result->fetch();
    	return $postsTotal;
	}

	public function getAllPosts($categorie, $firstPost, $postsByPage){
	    $bdd = $this->getBdd();
	    $result = $bdd->prepare('SELECT articles.id, articles.titre, articles.auteur, articles.descriptif, articles.image, 
	    						 categories.nom_categorie
	    						 FROM articles
	    						 LEFT JOIN categories
	    						 ON categories.id = articles.id_categorie
	    						 LEFT JOIN sous_categories
	    						 ON sous_categories.id = articles.id_sous_categorie    						 
	    						 WHERE nom_categorie = ? ORDER BY titre LIMIT '.$firstPost.','.$postsByPage);
	    $result->execute(array($categorie));
	    return $result;
	}

	public function getPosts($sous_categorie, $categorie){
	    $bdd = $this->getBdd();
	    $result = $bdd->prepare('SELECT articles.id, articles.titre, articles.auteur, articles.descriptif, articles.image, articles.id_categorie, 
	    						 categories.nom_categorie, sous_categories.nom_sous_categorie 
	    						 FROM articles
	    						 LEFT JOIN categories
	    						 ON categories.id = articles.id_categorie
	    						 LEFT JOIN sous_categories
	    						 ON sous_categories.id = articles.id_sous_categorie    						 
	    						 WHERE nom_sous_categorie = ? AND nom_categorie = ? ORDER BY titre');
	    $result->execute(array($sous_categorie, $categorie));
	    return $result;
	}
	
    public function getPost($postId){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT articles.id, articles.titre, articles.auteur, articles.descriptif, articles.image, 
        						 categories.nom_categorie, sous_categories.nom_sous_categorie
        						 FROM articles 
        						 LEFT JOIN categories
	    						 ON categories.id = articles.id_categorie
	    						 LEFT JOIN sous_categories
	    						 ON sous_categories.id = articles.id_sous_categorie
	    						 WHERE articles.id = ?');
        $reponse->execute(array($postId));
        $post = $reponse->fetch();
        return $post;
    }    
}