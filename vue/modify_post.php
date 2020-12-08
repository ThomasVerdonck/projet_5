<?php $title = 'Modifier un article'; 
$css = 'public/style7.css';
?>

<?php ob_start(); ?>

<div class="container py-5">
    <section class="row">
    	<div class="col">
    		<p id="admin">Espace réservé aux administrateurs</p>
            <p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>
    	</div>
    </section>

    <section class="row">
    	<div class="col" class="border-primary">
            <h2>Modifier un article</h2>   
            <form enctype="multipart/form-data" action="index.php?action=updatePost" method="post">
                <div class="form-group">
                    <label for="title">Titre</label><br />
                    <input type="text" class="form-control" name="title" value="<?php echo $modifPost['titre']; ?>"/>
                </div>
                <div class="form-group">
                    <label for="categorie">ID catégorie</label><br />
                    <select class="form-control" name="cat">
                        <!--<option value="<?php echo $modifPost['id_categorie']; ?>"><?php echo $modifPost['nom_categorie']; ?></option>-->
                        <option value="1">Films</option>
                        <option value="2">Docus</option>
                        <option value="3">Séries</option>
                        <option value="4">Livres</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sous-categorie">ID sous-catégorie</label><br />
                    <select class="form-control" name="sous_cat" value="id_sous_categorie">
                        <!--<option value="<?php echo $modifPost['id_sous_categorie']; ?>"><?php echo $modifPost['nom_sous_categorie']; ?></option>-->
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
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">Image</label><br />
                    <img src="public/images/<?php echo $modifPost['image']; ?>" alt="<?php echo $modifPost['image']; ?>" class="img-fluid">
                    <input type="file" class="form-control" name="file"/>                
                </div>
                <div class="form-group">
                    <label for="content">Contenu</label><br />
                    <textarea class="form-control" id="mytextarea" name="content"><?php echo $modifPost['descriptif']; ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $modifPost['id']; ?>"/>           
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" id="submit" value="Ajouter"/>
                </div>
            </form>
        </div>    
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



