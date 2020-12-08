<?php
require_once("Manager.php");

class ConnectionManager extends Manager
{    //  Récupération de l'utilisateur et de son pass haché
    public function recover($pseudo){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT pseudo, password FROM admin WHERE pseudo = ?');
        $reponse->execute(array($pseudo));
        $resultat = $reponse->fetch();
        return $resultat;
    }

    public function adminAddPost($title, $content, $cat, $sousCat, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('INSERT INTO articles(titre, descriptif, id_categorie, id_sous_categorie, image, date_creation) 
        VALUES(?, ?, ?, ?, ?, NOW())');
        $addPost = $reponse->execute(array($title, $content, $cat, $sousCat, $fileName));
        return $addPost;
    }

    public function getAllPostsAdmin(){
	    $bdd = $this->getBdd();
	    $result = $bdd->query('SELECT articles.id, articles.titre, categories.nom_categorie, sous_categories.nom_sous_categorie 
	    						 FROM articles
	    						 LEFT JOIN categories
	    						 ON categories.id = articles.id_categorie
	    						 LEFT JOIN sous_categories
	    						 ON sous_categories.id = articles.id_sous_categorie    						 
	    						 ORDER BY nom_categorie ');
	    return $result;
	}

    public function adminSuppPost($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $reponse->execute(array($id));
        $resultat = $reponse->fetch();
        return $resultat;
    }

    public function modifAdminPost($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT *	FROM articles
        							/*LEFT JOIN categories
		    						ON categories.id = articles.id_categorie
		    						LEFT JOIN sous_categories
		    						ON sous_categories.id = articles.id_sous_categorie*/
        							WHERE id = ?');
        $modifPost = $reponse->execute(array($id));
        $result = $reponse->fetch();
        return $result;
    }

    public function updateAdminPostWithPic($id, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, descriptif = ?, id_categorie = ?, id_sous_categorie = ?, image = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['content'], $_POST['cat'], $_POST['sous_cat'], $fileName, $id));
        return $reponse;
    }

    public function updateAdminPost($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, descriptif = ?, id_categorie = ?, id_sous_categorie = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['content'], $_POST['cat'], $_POST['sous_cat'], $id));
        return $reponse;
    }
}