<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS com_date_fr FROM comments WHERE articleID = ? ORDER BY ID DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(articleID, author, comment, date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_auteur;charset=utf8', 'root', '');
        return $db;
    }
    
    public function add(CommentEntity $comments)
    {
        $q = $this->db->prepare('INSERT INTO comments(id, articleID, author, comment, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\')) VALUES(:id, :articleID, :author, :comment, :date)');

    $q->bindValue(':id', $comments->getId());
    $q->bindValue(':articleID', $comments->getArticleID());
    $q->bindValue(':author', $comments->getAuthor());
    $q->bindValue(':comment', $comments->getComment());
    $q->bindValue(':date', $comments->getDate());
    

    $q->execute();
    }
    
    public function update(CommentEntity $comments )
    {
        $q = $this->db->prepare('UPDATE comments SET articleID = :articleID, author = :author, comment = :comment, date = :date WHERE id = :id');

    $q->bindValue(':id', $comments->getId());
    $q->bindValue(':articleID', $comments->getArticleID());
    $q->bindValue(':author', $comments->getAuthor());
    $q->bindValue(':comment', $comments->getComment());
    $q->bindValue(':date', $comments->getDate());
    

    $q->execute();
    }
    
    public function signaler($commentID)
    {
        //$q = $this->db->prepare('UPDATE comments SET signaler = signaler + 1 WHERE id = :commentID' );
        //$q->bindValue(':commentID', $commentID);
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
    
    function delete(CommentEntity $comments)
    {
        $this->db->exec('DELETE FROM comments WHERE id = '.$comments->getId());
    }
}