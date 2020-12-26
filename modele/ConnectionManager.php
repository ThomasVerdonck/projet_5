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

    //CREER UN ARTICLE
    public function adminAddPost($title, $content, $cat, $sousCat, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('INSERT INTO articles(titre, descriptif, id_categorie, id_sous_categorie, image, date_creation) 
        VALUES(?, ?, ?, ?, ?, NOW())');
        $addPost = $reponse->execute(array($title, $content, $cat, $sousCat, $fileName));
        return $addPost;
    }

    public function adminAddPost2($title, $author, $content, $cat, $sousCat, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('INSERT INTO articles(titre, auteur, descriptif, id_categorie, id_sous_categorie, image, date_creation) 
        VALUES(?, ?, ?, ?, ?, ?, NOW())');
        $addPost = $reponse->execute(array($title, $author, $content, $cat, $sousCat, $fileName));
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
	    						 ORDER BY nom_categorie, nom_sous_categorie, titre ');
	    return $result;
	}

    // SUPPRIMER UN ARTICLE
    public function adminSuppPost($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $resultat = $reponse->execute(array(intval($id)));
        return $resultat;
    }

//ACCEDER AU FORMULAIRE POUR MODIFIER UN POST
    public function pageModifPost($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT articles.id, articles.titre, articles.auteur, articles.descriptif, articles.image, categories.nom_categorie, sous_categories.nom_sous_categorie 
                                    FROM articles
        							LEFT JOIN categories
		    						ON categories.id = articles.id_categorie
		    						LEFT JOIN sous_categories
		    						ON sous_categories.id = articles.id_sous_categorie
        							WHERE articles.id = ?');
        $pageModif = $reponse->execute(array($id));
        $result = $reponse->fetch();
        return $result;
    }
    
//METTRE A JOUR L'ARTICLE
    public function updateAdminPostWithPic($id, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, descriptif = ?, id_categorie = ?, id_sous_categorie = ?, image = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['content'], intval($_POST['id_cat']), intval($_POST['id_sous_cat']), $fileName, $id));
        return $reponse;
    }

    public function updateAdminPost($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, descriptif = ?, id_categorie = ?, id_sous_categorie = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['content'], intval($_POST['id_cat']), intval($_POST['id_sous_cat']), $id));
        return $reponse;
        
    }

    public function updateAdminPost2WithPic($id, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, auteur = ?, descriptif = ?, id_categorie = ?, id_sous_categorie = ?, image = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['author'], $_POST['content'], intval($_POST['id_cat']), intval($_POST['id_sous_cat']), $fileName, $id));
        return $reponse;
    }

    public function updateAdminPost2($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, auteur = ?, descriptif = ?, id_categorie = ?, id_sous_categorie = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['author'], $_POST['content'], intval($_POST['id_cat']), intval($_POST['id_sous_cat']), $id));
        return $reponse;
        
    }
}