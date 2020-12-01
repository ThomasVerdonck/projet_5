<?php $title = 'Regarde et pense'; 
$css = 'public/style2.css';?>

<?php ob_start(); ?>
<div>	
    <?php    
    while ($donnees = $posts->fetch()){
    ?>	
    <div class="col-12 col-md-4">
    	<h2>Catégorie: "<?php echo nl2br(htmlspecialchars($donnees['id_categorie']));?>"</h2>
		<h3>Genre: "<?php echo nl2br(htmlspecialchars($donnees['nom_genre']));?>"</h3>			
        <div class="card mb-4 col-12">
  			<img class="card-img-top col-3" src="public/images/cobayes_CIA.jpg" alt="">
  			<div class="card-body">
				<h5 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h5>
	    		<p class="card-text" id="contenu"><?php echo nl2br(htmlspecialchars($donnees['descriptif'])); ?></p>
	    		<a href="#" class="btn btn-primary">Voir plus</a>
  			</div>
		</div>
	</div>
	<?php
	}    
	$posts->closeCursor();
?>				
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>