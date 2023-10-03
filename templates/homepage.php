<?php $title = "Page d'accueil"; ?>

<?php ob_start(); ?>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Vous souhaitez nous contacter ? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous répondrai dans les plus brefs délais !</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            

                            <form action="index.php" method="post">
                                <!-- si message d'erreur on l'affiche -->
                                <?php if(isset($errorMessage)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom</label>
                                    <input type="name" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Mehal" required="required">
                                    <div id="name-help" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">Prénom</label>
                                    <input type="first_name" class="form-control" id="first_name" name="first_name" aria-describedby="first_name-help" placeholder="Samir" required="required">
                                    <div id="first_name-help" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com" required="required">
                                    <div id="email-help" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Ecrivez votre message ici" required="required"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>

                            <?php
                                if (isset($_POST['message']) && isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['name']) && !empty($_POST['message']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['first_name'])) {
                                    $retour = mail('mehal.samir@hotmail.fr', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['name'] . ' ' . $_POST['first_name'] . "\r\n" . 'Reply-to: ' . $_POST['email']);
                                    //$retour = mail('sam-77@hotmail.fr', 'Envoi depuis la page Contact', $_POST['message']);
                                    if($retour) {
                                        echo '<p>Votre message a bien été envoyé.</p>';
                                    }
                                     else{
                                        echo '<p>Votre message a eu un problème.</p>';
                                     }   
                                }
                            ?>
                        </div>
                        <p>Voici mon <a href="CV.pdf">CV</a></p>
                    </div>
                </div>
            </div>
        </main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
