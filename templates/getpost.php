<?php $title = $post->title; ?>

<?php $token_delete_post = uniqid(rand(), true);

$_SESSION['token_delete_post'] = $token_delete_post; ?>

<?php ob_start(); ?>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>
                                <?php echo htmlspecialchars($post->title); ?>
                            </h1>
                            <h2 class="subheading">
                                <?php echo htmlspecialchars($post->chapo); ?>
                            </h2>
                            <span class="meta">
                                Posted by
                                <?php echo htmlspecialchars($post->author); ?>
                                le <?php echo $post->frenchCreationDate; ?>
                            </span>
                        </div>
                        <p>
                            <?php echo nl2br(htmlspecialchars($post->content)); ?>
                        </p>
                        <?php 
                        if(!empty($_SESSION['loggedUser']) && $_SESSION['loggedUser']==$post->loggedUser){
                        ?>
                        <!-- Divider-->
                        <hr class="my-4" />
                    
                        <!-- Pager-->
                        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=modifypost&id=<?php echo $post->id; ?>&title=<?php echo $post->title; ?>&author=<?php echo $post->author; ?>&chapo=<?php echo $post->chapo; ?>&content=<?php echo $post->content; ?>">Modifier le Post</a></div>

                        <!-- Divider-->
                        <hr class="my-4" />

                        <!-- Pager-->
                        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=deletepost&id=<?php echo $post->id; ?>&token_delete_post=<?php echo $token_delete_post;?>" ?>Supprimer le Post</a></div>

                        <!-- Divider-->
                        <hr class="my-4" />

                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </article>

        <article class="mb-4">
        <?php comments($post->id); ?>
        <?php addComment($post->id, $input) ?>
        </article>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>