<?php

require_once('models/register.php');

function addUser(array $input) {
    $email = null;
	$password = null;
    
	if (!empty($input['email']) && !empty($input['password'])) {
		if (filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
			if(!preg_match("/^[a-zA-Z0-9-!,.;:+=_*^$' ]/",$input['password'])){
				$passwordErr = "Only letters, numbers, white space and special character allowed";
			}
			else{
				$email = $input['email'];
    			//$password = $input['password'];
				$password = password_hash($input['password'], PASSWORD_DEFAULT);

				$loginRepository = new LoginRepository();
    			$success = $loginRepository->createUser($email, $password);
    			if (!$success) {
    				die('Impossible d\'ajouter l\'utilisateur !');
				} else {
    				header('Location: index.php?action=login');
				}
    			//page vers laquelle on se redirige avec header
			}
			
		}
    	
	} else {
    	//die('Les données du formulaire sont invalides.');
	}

	

    require('templates/register.php');
}


function logIn(array $input) {
    $email = null;
	$password = null;
    
	if (!empty($input['email']) && !empty($input['password'])) {
		if (filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
			if (!preg_match("/^[a-zA-Z0-9-!,.;:+=_*^$' ]/",$input['password'])){
				$passwordErr = "Only letters, numbers, white space and special character allowed";
			} else {
				if(isset($_SESSION['token_login']) && isset($input['token_login'])){
					if($_SESSION['token_login'] == $input['token_login']){
						$email = $input['email'];
						$password = $input['password'];
		
						$loginRepository = new LoginRepository();
						$loggedUser = $loginRepository->login($email, $password);
						if (!$loggedUser || $loggedUser==null) {
							//die("Impossible de se connecter ! L'email ou le mot de passe est incorrect.");
							$errorMessage = sprintf("Les informations envoyées ne permettent pas de vous identifier. L'email ou le mot de passe est incorrect.");
							$token_login = uniqid(rand(), true);
							$_SESSION['token_login'] = $token_login;
						} else {
							$_SESSION['loggedUser'] = $loggedUser['email'];
							$_SESSION['statut'] = $loggedUser['statut'];
							header('Location: index.php');
						}
					}
				}
			}
			
		}
		
	} else {
    	//die('Les données du formulaire sont invalides.');
		$token_login = uniqid(rand(), true);
		$_SESSION['token_login'] = $token_login;
	}

	
    //page vers laquelle on se redirige avec header

    require('templates/login.php');

	//return $_SESSION['loggedUser'];
}

function deconnect(){

	$_SESSION = array();
	session_destroy();
	header('Location: index.php');
}
