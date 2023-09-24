<?php //$title = "Liste des commentaires"; ?>

<?php //ob_start(); ?>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <?php
    	                foreach ($comments as $comment) {
    	            ?>
                    <!-- Post preview-->
                        <div class="post-preview">
                                    <!--<a href="post.html">-->
                                        <!--<h3 class="post-subtitle">
                                            <?php //echo htmlspecialchars($comment->title); ?>
                                        </h3>-->
                                        <h3 class="post-subtitle">
                                            <?php echo htmlspecialchars($comment->content); ?>
                                        </h3>
                                    </a>
                                    <p class="post-meta">
                                        Posted by <?php echo htmlspecialchars($comment->author); ?>
                                        le <?php echo $comment->frenchCreationDate; ?>
                                    </p>
                                </div>
                    
                                <!-- Divider-->
                                <hr class="my-4" />
    	            <?php
    	            } // The end of the posts loop.
    	            ?>
        
                </div>
            </div>
        </div>
<?php //$content = ob_get_clean(); ?>

<?php //require('layout.php') ?>
        