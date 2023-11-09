<!-- Base de données -->

        <?php

class Post
{
	public string $title;
    public string $author;
	public string $frenchCreationDate;
	public string $content;
	public string $chapo;
	public string $id;
	public string $loggedUser;
}


class PostRepository
{
    public ?PDO $database = null;

    public function dbConnect()
	{
    	if ($this->database === null) {
        	$this->database = new PDO(DB::$host_name.DB::$db_name.DB::$charset, DB::$identifiant, DB::$password);
    	}
	}


	public function getPosts(): array 
	{
		$this->dbConnect();
    	$statement = $this->database->query(
        	"SELECT id, title, description, DATE_FORMAT(date_of_creation, '%d/%m/%Y à %Hh%imin%ss') AS date_creation FROM posts ORDER BY date_of_creation DESC"
    	);
		$posts = [];

		while (($row = $statement->fetch())) {
			$post = new Post();
			$post->id = $row['id'];
        	$post->title = $row['title'];
			$post->chapo = $row['description'];
        	$post->frenchCreationDate = $row['date_creation'];
		
			$posts[] = $post;
		}

		return $posts;
	}


	public function getPost($identifier): object 
	{


		$this->dbConnect();
        $statement = $this->database->prepare(
		"SELECT id, title, content, author, description, loggedUser, DATE_FORMAT(date_of_creation, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM posts WHERE id = ?"
		);
		$statement->execute([$identifier]);
 
		$row = $statement->fetch();
		$post = new Post();
		$post->id = $row['id'];
        $post->title = $row['title'];
		$post->content = $row['content'];
        $post->author = $row['author'];
		$post->chapo = $row['description'];
		$post->frenchCreationDate = $row['creation_date'];
		$post->loggedUser = $row['loggedUser'];
	

		return $post;
	}


	public function createPost(string $title, string $author, string $description, string $content): bool 
	{

		$this->dbConnect();
        $statement = $this->database->prepare(
		"INSERT INTO posts(title, author, description, content, loggedUser, date_of_creation) VALUES(?, ?, ?, ?, ?, NOW())"
		);
		$affectedLines = $statement->execute([$title, $author, $description, $content, $_SESSION['loggedUser']]);
	
	

		return ($affectedLines > 0);
	}


	public function modifyPost(string $id_post, string $title, string $author, string $description, string $content): bool 
	{

		$this->dbConnect();
        $statement = $this->database->prepare(
		"UPDATE posts SET title = ?, author = ?, description = ?, content = ?, date_of_creation = NOW() WHERE id = ?"
		);
		$affectedLines = $statement->execute([$title, $author, $description, $content, $id_post]);
	
	

		return ($affectedLines > 0);
	}


	public function deletePost( string $id_post): bool 
	{

		$this->dbConnect();
        $statement = $this->database->prepare(
		'DELETE FROM posts WHERE id = ?'
		);
		$affectedLines = $statement->execute([$id_post]);
	
	

		return ($affectedLines > 0);
	}


}
        ?>
