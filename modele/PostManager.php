<?php
require_once("Manager.php");

class PostManager extends Manager
{
	public function getLastPosts(){
	    $bdd = $this->getBdd();
	    $result = $bdd->query('SELECT articles.titre, articles.descriptif, articles.image
						 		FROM categories
								LEFT JOIN articles
								ON articles.id_categorie = categories.id ORDER BY date_creation DESC LIMIT 0, 3 ');
		return $result;
	}

	public function getPosts($sous_categorie, $categorie){
	    $bdd = $this->getBdd();
	    $result = $bdd->prepare('SELECT articles.titre, articles.descriptif, articles.image, articles.id_categorie, categories.nom_categorie, sous_categories.nom_sous_categorie 
	    						 FROM articles
	    						 LEFT JOIN categories
	    						 ON categories.id = articles.id_categorie
	    						 LEFT JOIN sous_categories
	    						 ON sous_categories.id = articles.id_sous_categorie    						 
	    						 WHERE nom_sous_categorie = ? AND nom_categorie = ? ORDER BY titre ');
	    $result->execute(array($sous_categorie, $categorie));
	    return $result;
	}

    public function getPost($postId)
    {
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT id, titre, descriptif, image FROM articles WHERE id = ?');
        $reponse->execute(array($postId));
        $post = $reponse->fetch();
        return $post;
    }

    public function getComments($postId)
    {
        $bdd = $this->getBdd();
        $comments = $bdd->prepare('SELECT id, id_post, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, signalements FROM commentaires WHERE id_post = ? ORDER BY date_commentaire DESC');
        $comments->execute(array($postId));
        return $comments;
    }
}