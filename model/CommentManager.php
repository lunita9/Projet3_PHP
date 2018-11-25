<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS com_date_fr FROM comments WHERE             articleID = ? ORDER BY ID DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    
    public function getSignalComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment FROM comments WHERE signaler>0');
        
        return $req;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(articleID, author, comment, date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, htmlspecialchars($author), htmlspecialchars($comment)));

        return $affectedLines;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_auteur;charset=utf8', 'root', '');
        return $db;
    }
    

    public function signaler($commentID)
    {
        
        $db = $this->dbConnect();
        $q = $db->prepare('UPDATE comments SET signaler = signaler + 1 WHERE id = ?');
        $q->execute(array($commentID));
        
    }
    
    public function dessignaler($commentID)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('UPDATE comments SET signaler = 0 WHERE id = ?');
        $q->execute(array($commentID));
    }
    
    public function supprimer_comment($commentID)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM comments WHERE id = ?');
        $q->execute(array($commentID));
    }
    

}