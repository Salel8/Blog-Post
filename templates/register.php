<?php $title = "S'enregistrer"; ?>

<?php ob_start(); ?>
        <!-- Main Content-->
        <main class="mb-4">

            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Enregistrement</p>
                        <div class="my-5">
                            <!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
                            <?php if(!isset($loggedUser)): ?>
                            <form action="index.php?action=register" method="post">
                                <!-- si message d'erreur on l'affiche -->
                                <?php if(isset($errorMessage)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com" required="required">
                                    <div id="email-help" class="form-text">L'email sera utilisé pour se connecter.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password" required="required">
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                            <!-- 
                                Si utilisateur/trice bien connectée on affiche un message de succès
                            -->
                            <?php else: ?>
                                <div class="alert alert-success" role="alert">
                                    Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>