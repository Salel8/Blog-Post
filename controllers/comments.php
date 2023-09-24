<?php
// controllers/login.php

require_once('models/comments.php');

function comments(string $identifier) {
    $commentRepository = new CommentRepository();
	$comments = $commentRepository->getComments($identifier);

    require('templates/getcomments.php');
}


function addComment(string $identifier, array $input) {
    $author = null;
	$content = null;

	$authorErr = null;
	$contentErr = null;
    
	if (!empty($input['author']) && !empty($input['content'])) {
        $author = $input['author'];
    	$content = $input['content'];

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
        
		if ($authorErr=="" && $contentErr==""){
			$commentRepository = new CommentRepository();
    		$success = $commentRepository->createComment($identifier, $author, $content);
    		if (!$success) {
    			die('Impossible d\'ajouter le post !');
			} else {
    			header('Location: index.php?action=post&id=' . $identifier);
			}
    		//page vers laquelle on se redirige avec header
		}
	} else {
    	//die('Les données du formulaire sont invalides.');
	}

    
    require('templates/addcomment.php');
}

function commentsAdmin() {
    $commentRepository = new CommentRepository();
	$comments = $commentRepository->getCommentsAdmin();

    require('templates/getCommentsAdmin.php');
}

function updateCommentsAdmin(string $id_comment, string $token_admin) {

	if(isset($_SESSION['token_admin']) && isset($token_admin)){
		if($_SESSION['token_admin'] == $token_admin){
			$commentRepository = new CommentRepository();
    		$success = $commentRepository->modifyCommentsAdmin($id_comment);
    		if (!$success) {
    			die('Impossible de modifier le commentaire !');
			} else {
    			header('Location: index.php?action=admin');
			}
    		//page vers laquelle on se redirige avec header
		
    		//require('templates/getpost.php');
		}
	}

	
}


function eraseCommentAdmin(string $id_comment, string $token_admin) {

	if(isset($_SESSION['token_admin']) && isset($token_admin)){
		if($_SESSION['token_admin'] == $token_admin){
			$commentRepository = new CommentRepository();
    		$success = $commentRepository->deleteCommentsAdmin($id_comment);
    		if (!$success) {
    			die('Impossible de supprimer le post !');
			} else {
    			header('Location: index.php?action=admin');
			}
    		//page vers laquelle on se redirige avec header
		
    		//require('../templates/getpost.php');
		}
	}

    
}


