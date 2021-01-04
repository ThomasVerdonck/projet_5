<?php $title = $categorie; 
$css = 'public/style2.css';?>

<?php ob_start(); ?>
<div class="container py-5">	 
	<h2>Catégorie: <?php echo nl2br(htmlspecialchars($categorie));?></h2>
    <div class="row justify-content-center mt-3">
	    <?php    
	    while ($donnees = $allPosts->fetch()){
	    ?>
			<div class="card mb-3 col-lg-6" style="max-width: 540px;">
			  <div class="row">
			    <div class="col-md-4">
			      <a href="index.php?action=showPost&id=<?php echo $donnees['id']?>">
			      	<img class="card-img" src="public/images/<?php echo $donnees['image']; ?>" alt="<?php echo $donnees['image']; ?>">
			      </a>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h4 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h4>
			        <?php if ($donnees['auteur'] && !empty($donnees['auteur'])) {
                    ?>
		        	<h5 class="card-title">De <?php echo nl2br(htmlspecialchars($donnees['auteur'])); ?></h5>
			        <?php
                	}?>
			        <p class="card-text" id="contenu"><?php echo nl2br(htmlspecialchars($donnees['descriptif'])); ?></p>
			        <a href="index.php?action=showPost&id=<?php echo $donnees['id']?>" class="btn btn-primary">Voir plus</a>
			      </div>
			    </div>
			  </div>
			</div>		
		<?php
		}    
		$allPosts->closeCursor();		
		?>	
	</div>

	<nav aria-label="...">
  		<ul class="pagination">  			
			<?php
			for ($i=1; $i <= $pagesTotal ; $i++) {
				if (isset($_GET['page']) AND !empty($_GET['page'])){
					if($i === intval($_GET['page'])){
						echo '<li class="page-item active"><a class="page-link" href="index.php?action='.$_GET['action'].'&page='.$i.'">'.$i.'</a></li> ';
					}
					else{
						echo '<li class="page-item"><a class="page-link" href="index.php?action='.$_GET['action'].'&page='.$i.'">'.$i.'</a></li> ';
					}
				}
				elseif($i === 1){
					echo '<li class="page-item active"><a class="page-link" href="index.php?action='.$_GET['action'].'&page='.$i.'">'.$i.'</a></li> ';
				}
				else{
					echo '<li class="page-item"><a class="page-link" href="index.php?action='.$_GET['action'].'&page='.$i.'">'.$i.'</a></li> ';

				}
			}
			?>			
		</ul>
	</nav>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>