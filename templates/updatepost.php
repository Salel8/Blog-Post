<?php $title = "Modifier un post"; ?>

<?php ob_start(); ?>
        <!-- Main Content-->
        <main class="mb-4">

            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h2>Modifiez votre post</h2>
                        <div class="my-5">
                            <form action="index.php?action=modifypost&id=<?php echo $id_post?>" method="post">    
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titre</label>
                                    <input type="title" class="form-control" id="title" name="title" aria-describedby="title-help" placeholder="Exemple de titre" value="<?php echo $_GET["title"]; ?>" required="required">
                                    <div id="title-help" class="form-text">Utilisez un titre valide</div>
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Auteur</label>
                                    <input type="author" class="form-control" id="author" name="author" aria-describedby="author-help" placeholder="Exemple d'auteur" value="<?php echo $_GET["author"]; ?>" required="required">
                                    <div id="author-help" class="form-text">Utilisez votre nom et prénom</div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter your description here..." style="height: 12rem" required="required"><?php echo $_GET["chapo"]; ?></textarea>
                                    <div id="description-help" class="form-text">Utilisez des caractères valides</div>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Contenu</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="Enter your post here..." style="height: 12rem" required="required"><?php echo $_GET["content"]; ?></textarea>
                                    <div id="content-help" class="form-text">Utilisez des caractères valides</div>
                                </div>
                                <input type="hidden" name="token_update_post" id="token_update_post" value="<?php echo $token_update_post; ?>"/>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>