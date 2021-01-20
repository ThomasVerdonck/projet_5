<?php $title = 'Regarde et pense'; 
$css = 'public/style.css';?>

<?php ob_start();?>
<div class="container mt-5 py-5">				
 
	<div class="container py-5">
		<h2>Dernières mises à jour:</h2>		        
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner">
			<?php
			$ligne = 1;
			while ($donnees = $lastPosts->fetch()){
				if ($ligne === 1) {
				?>
					<div class="carousel-item active" style="background-image:url(<?php echo $donnees['image']; ?>)">
						<a href="index.php?action=showPost&id=<?php echo $donnees['id']?>">
							<img src="public/images/<?php echo $donnees['image']; ?>" class="d-block w-100" alt="<?php echo $donnees['image']; ?>">
						</a>
					    <div id="texte" class="carousel-caption d-none d-md-block">
					    	<h4 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h4>
						</div>
					</div>
				<?php
				}
				else{
				?>					
					<div class="carousel-item">
						<a href="index.php?action=showPost&id=<?php echo $donnees['id']?>">
							<img src="public/images/<?php echo $donnees['image']; ?>" class="d-block w-100" alt="<?php echo $donnees['image']; ?>">
						</a>
						<div id="texte" class="carousel-caption d-none d-md-block">
					    	<h4 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h4>
						</div>
					</div>
				<?php
				}
				$ligne++;
			}
			$lastPosts->closeCursor();
			?>
			</div>			
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>			
		</div>
	</div>
</div>

<div id="presentation">
  	<p id="texte_accueil"><b>Vous voulez des réponses à vos questions? Réveillez l'enfant qui sommeille en vous!</b><br>
		Ce site propose des films, des documentaires et des livres qui permettent d'éveiller la curiosité et de développer un esprit critique.
		<br>Mais avant tout, pourquoi ce site s'appelle-t-il <b>la grande évasion?</b><br>
		Il n'aura échappé à personne que nous traversons des graves crises en tout genre: économique, sociale, sanitaire, écologique, idéologique...
		On peut parler de crise systémique! La fin d'une ère de gloire et d'insousciance.<br>
		<b>Comment en est-on arrivé là?</b><br>La raison est que nous vivons dans une prison, une prison mentale dont nous avons nous-mêmes construit les murs. 
		Ces murs sont représentés par:
		<br>- nos croyances erronées, érigées comme des dogmes
		<br>- notre enseignement commun, qui permet de nous spécialiser dans un domaine et qui nous confère une étroitesse d'esprit
		<br>- notre orgueil et l'illusion de la connaissance, qui sont bien plus dangereux que l'ignorance
		<br>- notre train de vie hédoniste qui nous vole tout notre temps.
		<br>Nous avons besoin de dompter le temps, de remettre en question nos fausses certitudes, de retrouver un esprit critique pour trouver la cause des causes. 
		Mais, pour y arriver, nous avons besoin d'une qualité essentielle qui est l'<b>humilité</b>. Elle est <b>le graal</b>; sans elle, l'enfant au mille questionnements ne se 
		réveillera jamais. Et l'on mourra sans avoir trouvé <b>la rose des roses</b>.
		<b>Surtout, n'oubliez pas de laisser un commentaire. Et faites-nous part de vos réflexions les plus profondes.</b><br></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>