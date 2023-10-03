<?php
// controllers/login.php

require_once('models/posts.php');
//require_once('controllers/comments.php');

function posts() {
	$postRepository = new PostRepository();
    $posts = $postRepository->getPosts();

    require('templates/getposts.php');
}

function post(string $identifier, $input) {
	$postRepository = new PostRepository();
    $post = $postRepository->getPost($identifier);

	//comments($identifier);

    require('templates/getpost.php');
}

function addPost(array $input) {
    $author = null;
	$content = null;
    $title = null;
	$description = null;

	$authorErr = null;
	$contentErr = null;
	$titleErr = null;
	$descriptionErr = null;

	

		if (!empty($input['author']) && !empty($input['content']) && !empty($input['title']) && !empty($input['description'])) {
			if(isset($_SESSION['token_addpost']) && isset($input['token_addpost'])){
				if($_SESSION['token_addpost'] == $input['token_addpost']){
					$author = $input['author'];
					$content = $input['content'];
					$title = $input['title'];
					$description = $input['description'];

					if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$author)) {
						$authorErr = "Only letters, white space, numbers and special character allowed";
					} else {
						$authorErr = "";
					}
					if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$content)) {
						$contentErr = "Only letters, white space and special character allowed";
					} else {
						$contentErr = "";
					}
					if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$title)) {
						$titleErr = "Only letters, white space and special character allowed";
					} else {
						$titleErr = "";
					}
					if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$description)) {
						$descriptionErr = "Only letters, white space and special character allowed";
					} else {
						$descriptionErr = "";
					}
	
					if ($authorErr=="" && $contentErr=="" && $titleErr=="" && $descriptionErr==""){
						$postRepository = new PostRepository();
						$success = $postRepository->createPost($title, $author, $description, $content);
						if (!$success) {
							die('Impossible d\'ajouter le post !');
						} else {
							header('Location: index.php?action=posts');
						}
						//page vers laquelle on se redirige avec header
					}
				}
			}
			
		} else {
			//die('Les données du formulaire sont invalides.');
			$token_addpost = uniqid(rand(), true);
			$_SESSION['token_addpost'] = $token_addpost;
		}
	

	

    require('templates/addpost.php');
}

function updatePost(string $id_post, array $input) {
    $author = null;
	$content = null;
    $title = null;
	$description = null;

	$authorErr = null;
	$contentErr = null;
	$titleErr = null;
	$descriptionErr = null;

	if (!empty($input['author']) && !empty($input['content']) && !empty($input['title']) && !empty($input['description'])) {
		if(isset($_SESSION['token_update_post']) && isset($input['token_update_post'])){
			if($_SESSION['token_update_post'] == $input['token_update_post']){
				$author = $input['author'];
    			$content = $input['content'];
        		$title = $input['title'];
    			$description = $input['description'];

				if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$author)) {
					$authorErr = "Only letters, white space, numbers and special character allowed";
				} else {
					$authorErr = "";
				}
				if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$content)) {
					$contentErr = "Only letters, white space and special character allowed";
				} else {
					$contentErr = "";
				}
				if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$title)) {
					$titleErr = "Only letters, white space and special character allowed";
				} else {
					$titleErr = "";
				}
				if (!preg_match("/^[a-zA-Z0-9-_!?,.;:+=' ]/",$description)) {
					$descriptionErr = "Only letters, white space and special character allowed";
				} else {
					$descriptionErr = "";
				}

				if ($authorErr=="" && $contentErr=="" && $titleErr=="" && $descriptionErr==""){
					$postRepository = new PostRepository();
    				$success = $postRepository->modifyPost($id_post, $title, $author, $description, $content);
    				if (!$success) {
    					die('Impossible de modifier le post !');
					} else {
    					header('Location: index.php?action=post&id=' . $id_post);
					}
    				//page vers laquelle on se redirige avec header
				}
			}
		}
    	
	} else {
    	//die('Les données du formulaire sont invalides.');
		$token_update_post = uniqid(rand(), true);
		$_SESSION['token_update_post'] = $token_update_post;
	}

	
    require('templates/updatepost.php');
	
}


function erasePost(string $identifier, string $token_delete_post) {

	if(isset($_SESSION['token_delete_post']) && isset($token_delete_post)){
		if($_SESSION['token_delete_post'] == $token_delete_post){
			$postRepository = new PostRepository();
    		$success = $postRepository->deletePost($identifier);
    		if (!$success) {
    			die('Impossible de supprimer le post !');
			} else {
    			header('Location: index.php?action=posts');
			}
    		//page vers laquelle on se redirige avec header
		}
	}
    

}


