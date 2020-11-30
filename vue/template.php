<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
		<link rel="stylesheet" href="<?php echo $css;?>"/>
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css"/>
		
		<title><?= $title ?></title>		
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<header class="col">					
					<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
						<a class="navbar-brand" href="index.php?action=accueil"><img src="public/images/logo5.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
					        <ul class="nav nav-tabs">
				            	<li class="nav-item">
				            		<a class="nav-link active" href="index.php?action=accueil">Accueil</a>
				            	</li>
				            	<li class="nav-item dropdown">
				            		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Films</a>
					            	<div class="dropdown-menu">
								      	<a class="dropdown-item" href="index.php?action=historique">Historique</a>
								      	<a class="dropdown-item" href="index.php?action=science-fiction">Science-Fiction</a>
								      	<a class="dropdown-item" href="index.php?action=drame">Drame</a>
								      	<a class="dropdown-item" href="index.php?action=espionnage">Espionnage</a>
								    </div>
							  	</li>
							  	<li class="nav-item dropdown">
				            		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Docus</a>
					            	<div class="dropdown-menu">
								      	<a class="dropdown-item" href="index.php?action=histoire">Histoire</a>
								      	<a class="dropdown-item" href="index.php?action=sante">Santé</a>
								      	<a class="dropdown-item" href="index.php?action=science">Science</a>
								      	<a class="dropdown-item" href="index.php?action=mysteres">Mystères</a>
								    </div>
							  	</li>
							  	<li class="nav-item dropdown">
				            		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Séries</a>
					            	<div class="dropdown-menu">								      	
								      	<a class="dropdown-item" href="index.php?action=science-fiction">Science-Fiction</a>
								      	<a class="dropdown-item" href="index.php?action=drame">Drame</a>
								      	<a class="dropdown-item" href="index.php?action=espionnage">Espionnage</a>
								    </div>
							  	</li>
							  	<li class="nav-item dropdown">
				            		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Livres</a>
					            	<div class="dropdown-menu">
								      	<a class="dropdown-item" href="index.php?action=histoire">Histoire</a>
								      	<a class="dropdown-item" href="index.php?action=sociologie">Sociologie</a>
								      	<a class="dropdown-item" href="index.php?action=sciences_interdites">Sciences interdites</a>
								      	<a class="dropdown-item" href="index.php?action=sante">Santé</a>
								    </div>
							  	</li>				            	
				            	<?php 
				            	if (!isset($_SESSION['pseudo'])){ 
				            	?>
				            	<li class="nav-item"><a class="nav-link" href="index.php?action=connection">Espace Admin</a></li>
				            	<?php
				            	}
				            	else{ 
				            	?>		            		
				            		<li class="nav-item"><a class="nav-link" href="index.php?action=dashboard">Tableau de bord</a></li>
				            		<li class="nav-item"><a class="nav-link" href="index.php?action=disconnect">Déconnexion</a></li>
				            	<?php
				            	}
				            	?>
					        </ul>
					    </div>		           	
			        </nav>
			    </header>
		    </div>
		</div>
		
    	<div class="container mt-5 py-5">
			<?= $content ?>				
		</div>

		
		<div class="bg-dark" id="bg-footer">
			<div class="container">			
				<div class="row pt-4 pb-3">
					<footer class="col">						
				
						<p>Ce site a été produit et mis en ligne dans le cadre de la formation "développeur Web junior" dispensée par le site de formation en ligne <span id="openclass">OpenClassrooms</span>.</p>													
					</footer>
				</div>				
			</div>
		</div>
		<!-- bibliothèques jQuery et Popper.js + bibliothèque JavaScript de Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>