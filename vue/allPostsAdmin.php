<?php $title = 'Liste de tous les articles'; 
$css = 'public/style6.css';
?>

<?php ob_start(); ?>

<div class="container py-5">
	<p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>

	<h2>Tous les articles</h2>
	<div class="table-responsive-sm mt-3 text-nowrap">
		<table class="table table-striped">
			<thead class="thead-light">
				<tr>
					<th scope="col">Titre</th>
					<th scope="col">Catégorie</th>
					<th scope="col">Genre</th>
					<th scope="col">Supprimer</th>
					<th scope="col">Modifier</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while ($donnees = $allPostsAdmin->fetch()){
				?>			
					<tr>
						<td><?php echo htmlspecialchars($donnees['titre']); ?></td>
						<td><?php echo htmlspecialchars($donnees['nom_categorie']); ?></td>
						<td><?php echo htmlspecialchars($donnees['nom_sous_categorie']); ?></td>
						<td><a class="btn btn-primary" href="<?php echo "index.php?action=suppPost&id=".$donnees['id']?>">Supprimer</a></td>
						<td><a class="btn btn-primary" href="<?php echo "index.php?action=pageModif&id=".$donnees['id']?>">Modifier</a></td>
					</tr>
				<?php
				}
				$allPostsAdmin->closeCursor();
				?>
			</tbody>
		</table>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>