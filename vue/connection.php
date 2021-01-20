<?php $title = 'Connexion'; 
$css = 'public/style3.css';
?>

<?php ob_start(); ?>
<div class="container mt-5 py-5">
    <div class="row py-5">
    	<p id="admin">Espace réservé à l'administration</p>
    </div>
    <div class="row">		
    	<img src="public/images/reveil.png"  class="img-fluid" alt="">
    </div>

    <section id="form">
    	<h2>Connexion</h2>
        <form action="index.php?action=log_in" method="post">
            <div class="labels">
                <label for="pseudo">Pseudo</label><br />
                <input type="text" id="pseudo" name="pseudo" required/>
            </div>
            <div class="labels">
                <label for="password">Mot de passe</label><br />
                <input type="password" class="password" name="password" required></input>
            </div>
            <div class="labels">
                <label for="remember">Se souvenir de moi</label>
                <input type="checkbox" id="remember" name="remember">
            </div>
            <div class="labels">
                <input type="submit" name="submit" id="submit" value="Se connecter"/>
            </div>
        </form>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



