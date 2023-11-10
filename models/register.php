<!-- Validation du formulaire--> 
<?php

class LoginRepository
{
    public ?PDO $database = null;

    public function dbConnect()
	{
    	if ($this->database === null) {
        	$this->database = new PDO(DB::$host_name.DB::$db_name.DB::$charset, DB::$identifiant, DB::$password);
    	}
	}

    public function createUser(string $email, string $password): bool
    {
        $this->dbConnect();
        $statement = $this->database->prepare(
            "INSERT INTO users(email, password) VALUES(?, ?)"
        );
        $affectedLines = $statement->execute([$email, $password]);
        
        

        return ($affectedLines > 0);
    }

	public function login(string $email, string $password)
	{
    	/*$this->dbConnect();
        $sqlQuery = 'SELECT * FROM users';
    	$statement = $this->database->prepare($sqlQuery);
    	$statement->execute();
        $users = $statement->fetchAll();

        $loggedUser = null;

    	foreach ($users as $user) {
            if (
                $user['email'] === $email &&
                //$user['password'] === $password
                password_verify($password, $user['password'])
            ) {
                $loggedUser = [
                    'email' => $user['email'],
                    'statut' => $user['statut'],
                ];
            } else {
                $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                    $email,
                    $password
                );
            }
        }*/

        $this->dbConnect();
        $statement = $this->database->prepare(
        "SELECT email, password, statut FROM users WHERE email = ?"
        );
        $statement->execute([$email]);
        $user = $statement->fetch();

        $loggedUser = null;

        if (
            isset($user) &&
            $user != null &&
            password_verify($password, $user['password'])
        ) {
            $loggedUser = [
                'email' => $user['email'],
                'statut' => $user['statut'],
            ];
        } else {
            /*$errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $email,
                $password
            );*/
            //$errorMessage = sprintf("Les informations envoyées ne permettent pas de vous identifier. L'email ou le mot de passe est incorrect.");
        }

    	return $loggedUser;
	}


}
    

?>

