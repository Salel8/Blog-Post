<!-- Base de données -->

        <?php

class Comment
{
	//public string $title;
    public string $author;
	public string $frenchCreationDate;
	public string $content;
	public string $id;
	public string $statut;
	public string $id_post;
}


class CommentRepository
{
    public ?PDO $database = null;

    public function dbConnect()
	{
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=localhost;dbname=blog_posts;charset=utf8', 'root', 'root');
    	}
	}

	public function getComments(string $identifier): array
	{
    	$this->dbConnect();
    	$statement = $this->database->prepare(
        	"SELECT author, content, DATE_FORMAT(date_of_creation, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE id_post = ? AND statut = ?"
    	);
    	$statement->execute([$identifier, 'Validate']);

    	$comments = [];
    	while (($row = $statement->fetch())) {
        	$comment = new Comment();
            $comment->author = $row['author'];
        	$comment->frenchCreationDate = $row['french_creation_date'];
        	$comment->content = $row['content'];
        	//$comment->id_post = $row['id_post'];

        	$comments[] = $comment;
    	}

    	return $comments;
	}


    public function createComment(string $identifier, string $author, string $content): bool
    {
        $this->dbConnect();
        $statement = $this->database->prepare(
            'INSERT INTO comments(id_post, author, content, date_of_creation) VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$identifier, $author, $content]);

        return ($affectedLines > 0);
    }


	//partie admin
	public function getCommentsAdmin(): array
	{
    	$this->dbConnect();
    	$statement = $this->database->prepare(
        	"SELECT id, author, content, DATE_FORMAT(date_of_creation, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE statut = ?"
    	);
		$statement->execute(['Pending']);

    	$comments = [];
    	while (($row = $statement->fetch())) {
        	$comment = new Comment();
			$comment->id = $row['id'];
        	//$comment->title = $row['title'];
            $comment->author = $row['author'];
        	$comment->frenchCreationDate = $row['french_creation_date'];
        	$comment->content = $row['content'];

        	$comments[] = $comment;
    	}

    	return $comments;
	}

	public function modifyCommentsAdmin( string $id_comment): bool 
	{

		$this->dbConnect();
        $statement = $this->database->prepare(
		"UPDATE comments SET statut = ? WHERE id = ?"
		);
		$affectedLines = $statement->execute(['Validate', $id_comment]);
	
	

		return ($affectedLines > 0);
	}


	public function deleteCommentsAdmin( string $id_comment): bool 
	{

		$this->dbConnect();
        $statement = $this->database->prepare(
		'DELETE FROM comments WHERE id = ?'
		);
		$affectedLines = $statement->execute([$id_comment]);
	
	

		return ($affectedLines > 0);
	}


}
        ?>
