<!-- Validation du formulaire--> 
<?php

class LoginRepository
{
    public ?PDO $database = null;

    public function dbConnect()
	{
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=localhost;dbname=blog_posts;charset=utf8', 'root', 'root');
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
    	$this->dbConnect();
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
        }

    	return $loggedUser;
	}


}
    

?>
