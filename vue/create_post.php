<?php $title = 'Créer un article'; 
$css = 'public/style5.css';
?>

<?php ob_start(); ?>
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
                <h2>Ajouter un article</h2>
                <p id="form_title">*Champs obligatoires</p>    
                <form enctype="multipart/form-data" action="index.php?action=addPost" method="post">
                    <div class="form-group">
                        <label for="title">Titre*</label><br />
                        <input type="text" id="title" class="form-control" name="title" required/>
                    </div>
                    
                    <div class="form-group">
                        <label for="author">Auteur</label><br />
                        <input type="text" id="author" class="form-control" placeholder="Ne remplir ce champ que pour la catégorie 'Livres' " name="author"/>
                    </div>

                    <div class="form-group">
                        <label for="categorie">ID catégorie*</label><br />
                        <select id="categorie" class="form-control" name="cat">
                            <option value="1">Films</option>
                            <option value="2">Docus</option>
                            <option value="4">Livres</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sous-categorie">ID sous-catégorie*</label><br />
                        <select id="sous-categorie" class="form-control" name="sous_cat">
                            <option value="1">Historique</option>
                            <option value="2">Science-fiction</option>
                            <option value="3">Drame</option>
                            <option value="4">Espionnage</option>
                            <option value="5">Histoire</option>
                            <option value="6">Santé</option>
                            <option value="7">Science</option>
                            <option value="8">Propagande</option>
                            <option value="9">Sociologie</option>
                            <option value="10">Sciences interdites</option>
                            <option value="11">Thriller</option>
                            <option value="12">Révélations</option>
                            <option value="13">Essais</option>
                            <option value="14">Nature</option>
                            <option value="15">Economie</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Image*</label><br />
                        <input type="file" id="file" class="form-control" name="file"/>                
                    </div>
                    <div class="form-group">
                        <label for="mytextarea">Contenu*</label><br />
                        <textarea class="form-control" id="mytextarea" name="content"></textarea>
                    </div>            
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="submit" value="Ajouter"/>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



