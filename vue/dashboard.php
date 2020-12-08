<?php $title = 'Espace Administration'; 
$css = 'public/style4.css';
?>

<?php ob_start(); ?>

<section class="row py-5" id="section_admin">
	<div class="col-12">
		<h2>Espace Administration</h2>
		<br>
		<nav id="menu_admin">
	        <ul id="liste_admin">
	        	<li><a href="index.php?action=create_post">Créer un article</a></li>
	        	<li><a href="index.php?action=listAllPostsAdmin">Voir tous les articles</a></li>
	        	<li><a href="index.php?action=manageComments">Gestion des commentaires</a></li>
	        </ul>		           	
	    </nav>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>