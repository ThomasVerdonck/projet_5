<?php $title = 'Regarde et pense'; 
$css = 'public/style2.css';?>

<?php ob_start(); ?>
<div class="container py-5">
	 
	<h2>Catégorie: <?php echo nl2br(htmlspecialchars($categorie));?></h2>
	<h3>Genre: <?php echo nl2br(htmlspecialchars($sous_categorie));?></h3>
    <?php    
    while ($donnees = $posts->fetch()){
    ?>    				
        <div class="card mb-4 col-12">
  			<img class="card-img-top col-3" src="public/images/<?php echo $donnees['image']; ?>" alt="<?php echo $donnees['image']; ?>">
  			<div class="card-body">
				<h5 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h5>
	    		<p class="card-text" id="contenu"><?php echo nl2br(htmlspecialchars($donnees['descriptif'])); ?></p>
	    		<a href="index.php?action=showPost&id=<?php echo $donnees['articles.id']?>" class="btn btn-primary">Voir plus</a>
  			</div>
		</div>
	
	<?php
	}    
	$posts->closeCursor();
?>				
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>