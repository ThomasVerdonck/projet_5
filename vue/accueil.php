<?php $title = 'Regarde et pense'; 
$css = 'style.css';?>

<?php ob_start(); ?>

<?php
if ($_GET['action'] == 'historique') {
?>	
	<div class="row-12 row-md-3 mt-5" id="corps">
		<h2>Catégorie "<?php echo $genre;?>"</h2>	
	    <?php    
	    while ($film = $films->fetch()){
	    ?>			
	        <div class="card mb-4">
	  			<img src="..." class="card-img-top" alt="...">
	  			<div class="card-body">
					<h5 class="card-title"><?php echo nl2br(htmlspecialchars($film['titre'])); ?></h5>
		    		<p class="card-text" id="contenu"><?php echo nl2br(htmlspecialchars($film['descriptif'])); ?></p>
		    		<a href="#" class="btn btn-primary">Voir plus</a>
	  			</div>
			</div>					
	    <?php
	    } 
	    $films->closeCursor();
		}
		?>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>