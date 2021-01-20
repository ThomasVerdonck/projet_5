<?php $title = 'Commentaires signalés'; 
$css = 'public/style9.css';
?>

<?php ob_start(); ?>
<div class="container mt-5 py-5">
	<div class="container py-5">
		<p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>
		<h2>Liste des commentaires signalés</h2>
		<div class="table-responsive mt-3">
			<table class="table table-striped">
				<thead class="thead-light">
					<tr>
						<th scope="col">Auteur</th>
						<th scope="col">Commentaire</th>
						<th scope="col">Supprimer</th>
						<th scope="col">Laisser le commentaire</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					while ($donnees = $allReportedComments->fetch()){
					?>			
						<tr>
							<td><?php echo htmlspecialchars($donnees['auteur']); ?></td>
							<td id="commentaire"><?php echo htmlspecialchars($donnees['commentaire']); ?></td>
							<td><a class="btn btn-primary" href="<?php echo "index.php?action=suppCom&id=".$donnees['id']?>">Supprimer</a></td>
							<td><a class="btn btn-primary" href="<?php echo "index.php?action=letCom&id=".$donnees['id']?>">Laisser</a></td>
						</tr>
					<?php
					}
					$allReportedComments->closeCursor();
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>