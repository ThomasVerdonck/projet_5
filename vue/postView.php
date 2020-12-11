<?php $title = $post['titre'];
$css = 'public/style8.css'; ?>

<?php ob_start(); ?>
<div class="container py-5">
    <h2>Catégorie: <?php echo nl2br(htmlspecialchars($categorie));?></h2>
    <h3>Genre: <?php echo nl2br(htmlspecialchars($sous_categorie));?></h3>
    <p><a href="index.php?action=lastPosts">Retour à l'accueil</a></p>

    <div class="row">
        <div class="col-12">
            <div class="card" id="chapter">
                <h2>
                    <?php echo htmlspecialchars($post['titre']); ?><br>
                </h2>
                <img class="card-img-top" src="public/images/<?php echo $post['image']; ?>" >
                <p id="content"><?php echo $post['descriptif'];?></p>
            </div>
        </div>      

        <section id="comments" class="col-12">
            <?php 
            if ($categorie = "Films") {
                ?><p>Avez-vous vu ce film?</p>
            <?php
            }
            elseif ($categorie = "Docus") {
                ?><p>Avez-vous vu ce documentaire?</p>
            <?php
            }
            elseif ($categorie = "Séries") {
                ?><p>Avez-vous vu cette série?</p>
            <?php
            }
            elseif ($categorie = "Livres") {
                ?><p>Avez-vous lu ce livre?</p>
            <?php
            }
            ?>
            <p>Qu'en avez-vous pensé?</p>
            <h2>Laissez un commentaire</h2>
            <?php
            // Affichage des commentaires
            while ($comment = $comments->fetch()){
            ?>
                <div class="col-12">                        
                    <p class="comment_author"><?php echo htmlspecialchars($comment['auteur']); ?></p>
                    <p class="comment_date">le <?php echo htmlspecialchars($comment['date_commentaire_fr']); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($comment['commentaire'])); ?></p>
                    <?php 
                        if($comment['signalements'] > 0){
                    ?>
                    <p class="text-danger">Ce commentaire est en cours de modération.</p>
                    <?php
                        }
                        else{
                    ?>
                    <button type="button" class="btn btn-danger" name="signal_comment"><a href="index.php?action=getReportedComment&id=<?php echo $comment['id'] ?>&postId=<?php echo $post['id'] ?>">Signaler ce commentaire</a>
                    </button>
                    <?php
                        }
                    ?>                        
                </div>
                <hr>
            <?php
            } 
            $comments->closeCursor();// Fin de la boucle des commentaires
            ?>            
        </section>

        <!-- Formulaire pour ajouter un commentaire-->
        <section id="add_comment" class="col-12">
            <div class="col-12">
                <h2>Ajouter un commentaire</h2>
                <p id="form_title">*Tous les champs sont obligatoires</p>    
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="author">Pseudo*</label><br />
                        <input type="text" class="form-control" name="author" required/>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire*</label><br />
                        <textarea class="form-control" name="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="submit" value="Envoyer"/>
                    </div>
                </form> 
            </div>  
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>