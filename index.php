<?php
session_start();
// routeur
require('controllers/posts.php');
require('controllers/comments.php');
require('controllers/register.php');

require('data/db.php');


if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'login') {
        logIn($_POST);
    } elseif ($_GET['action'] === 'register') {
        addUser($_POST);
    } elseif ($_GET['action'] === 'posts') {
        posts();
    } elseif ($_GET['action'] === 'post') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];

			//comments($identifier);
        	post($identifier, $_POST);
			//addComment($identifier, $_POST)
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';

        	die;
    	}
	} elseif ($_GET['action'] === 'addpost') {
    	addPost($_POST);
	} elseif ($_GET['action'] === 'modifypost') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];

        	updatePost($identifier, $_POST);
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';

        	die;
    	}
	} elseif ($_GET['action'] === 'deletepost') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];
			$token_delete_post = $_GET['token_delete_post'];

        	erasePost($identifier, $token_delete_post);
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';

        	die;
    	}
	} elseif ($_GET['action'] === 'admin') {
    	commentsAdmin();
	} elseif ($_GET['action'] === 'deletecommentadmin') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];
			$token_admin = $_GET['token_admin'];

        	eraseCommentAdmin($identifier, $token_admin);
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';

        	die;
    	}
	} elseif ($_GET['action'] === 'modifycommentadmin') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];
			$token_admin = $_GET['token_admin'];

        	updateCommentsAdmin($identifier, $token_admin);
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';

        	die;
    	}
	} elseif ($_GET['action'] === 'deconnect') {
    	deconnect();
	} else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
} else {
	require('templates/homepage.php');
}


