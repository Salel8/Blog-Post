<?php $title = "Liste des posts"; ?>

<?php ob_start(); ?>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <?php 
                    if(!empty($_SESSION['loggedUser'])){
                    ?>
                    <!-- Divider-->
                    <hr class="my-4" />
                    
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=addpost">Ajouter un Post</a></div>

                    <!-- Divider-->
                    <hr class="my-4" />

                    <?php 
                    }
                    ?>

                    <?php
    	foreach ($posts as $post) {
    	?>
        <!-- Post preview-->
            <div class="post-preview">
                        <a href="index.php?action=post&id=<?php echo $post->id ?>">
                            <h2 class="post-title">
                                <?php echo htmlspecialchars($post->title); ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?php echo htmlspecialchars($post->chapo); ?>
                            </h3>
                        </a>
                        <p class="post-meta">
                            Posté le
                            <?php echo $post->frenchCreationDate; ?>
                        </p>
                    </div>

                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=post&id=<?php echo $post->id ?>">Lien vers le Post →</a></div>
    	<?php
    	} // The end of the posts loop.
    	?>
                </div>
            </div>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
        
