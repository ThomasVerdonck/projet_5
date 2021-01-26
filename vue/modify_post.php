<?php $title = 'Modifier un article'; 
$css = 'public/style7.css';
?>

<?php ob_start();?>
<div class="container mt-5 py-5">
    <div class="container py-5">
        <div class="row">
        	<div class="col">
        		<p id="admin">Espace réservé aux administrateurs</p>
                <p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>
        	</div>
        </div>

        <div class="row">
        	<div class="col border-primary">
                <h2>Modifier un article</h2> 
                <form enctype="multipart/form-data" action="index.php?action=updatePost" method="post">
                    <div class="form-group">
                        <label for="title">Titre</label><br />
                        <input type="text" id="title" class="form-control" name="title" value="<?php echo $modifPost['titre']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="author">Auteur</label><br />
                        <input type="text" id="author" class="form-control" placeholder="Ne remplir ce champ que pour la catégorie 'Livres' " 
                        name="author" value="<?php echo $modifPost['auteur']; ?>"/>
                    </div>               
                    <div class="form-group">
                        <label for="categorie">ID catégorie</label><br />
                        <select id="categorie" class="form-control" name="id_cat">
                            <?php                        
                                for ($i=0; $i < count($categorie); $i++) { 
                                    if ($categorie[$i]["nom_categorie"] === $modifPost["nom_categorie"]) {
                                        echo '<option value="'.$categorie[$i]["id"].'" selected>'.$categorie[$i]["nom_categorie"].'</option>';
                                    } else {
                                        echo '<option value="'.$categorie[$i]["id"].'">'.$categorie[$i]["nom_categorie"].'</option>';
                                    }
                                    
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sous-categorie">ID sous-catégorie</label><br />
                        <select id="sous-categorie" class="form-control" name="id_sous_cat">
                            <?php                        
                                for ($i=0; $i < count($sousCategorie); $i++) { 
                                    if ($sousCategorie[$i]["nom_sous_categorie"] === $modifPost["nom_sous_categorie"]) {
                                        echo '<option value="'.$sousCategorie[$i]["id"].'" selected>'.$sousCategorie[$i]["nom_sous_categorie"].'</option>';
                                    } else {
                                        echo '<option value="'.$sousCategorie[$i]["id"].'">'.$sousCategorie[$i]["nom_sous_categorie"].'</option>';
                                    }
                                    
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Image</label><br />
                        <img src="public/images/<?php echo $modifPost['image']; ?>" alt="<?php echo $modifPost['image']; ?>" class="img-fluid">
                        <input type="file" id="file" class="form-control" name="file"/>                
                    </div>
                    <div class="form-group">
                        <label for="mytextarea">Contenu</label><br />
                        <textarea class="form-control" id="mytextarea" name="content"><?php echo $modifPost['descriptif']; ?></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $modifPost[0]; ?>"/>           
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="submit" value="Mettre à jour"/>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



