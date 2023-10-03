<?php //$title = "Ajout d'un commentaire"; ?>

<?php //ob_start(); ?>
        <!-- Main Content-->
        <article class="mb-4">

            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Ajouter un commentaire</p>
                        <div class="my-5">
                            <form action="index.php?action=post&id=<?php echo $identifier ?>" method="post">    
                                <!--<div class="mb-3">
                                    <label for="title" class="form-label">Titre</label>
                                    <input type="title" class="form-control" id="title" name="title" aria-describedby="title-help" placeholder="you@exemple.com">
                                    <div id="title-help" class="form-text">Utilisez un titre valide</div>
                                </div>-->
                                <div class="mb-3">
                                    <label for="author" class="form-label">Auteur</label>
                                    <input type="author" class="form-control" id="author" name="author" aria-describedby="author-help" placeholder="Entrez votre nom ou votre pseudo" required="required">
                                    <div id="author-help" class="form-text">Utilisez votre nom et prénom</div>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Contenu</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="Entrez le contenu de votre post ici..." style="height: 12rem" required="required"></textarea>
                                    <div id="content-help" class="form-text">Utilisez des caractères valides</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        
<?php //$content = ob_get_clean(); ?>

<?php //require('layout.php') ?>