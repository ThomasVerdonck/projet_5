<?php $title = 'Texte de présentation'; 
$css = 'public/style10.css';
?>

<?php ob_start();?>

<div class="container py-5">
    <section class="row">
    	<div class="col">
    		<p id="admin">Espace réservé aux administrateurs</p>
            <p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>
    	</div>
    </section>

    <section class="row">
    	<div class="col" class="border-primary">
            <h2>Texte de présentation présent sur la page d'accueil</h2>    
            <form enctype="multipart/form-data" action="index.php?action=updateText" method="post">                
                <div class="form-group">
                    <label for="content">Contenu</label><br />
                    <textarea class="form-control" id="presentation_area" name="content"><?php echo $modifText; ?></textarea>
                </div>            
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" id="submit" value="Mettre à jour"/>
                </div>
            </form>
        </div>    
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



