<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY ID DESC');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    

    public function addArticle($titre, $contenu)
    {
        $db = $this->dbConnect();
        $articles = $db->prepare('INSERT INTO articles(title, content, date) VALUES(?, ?, NOW())');
        $affectedLines = $articles->execute(array($titre, $contenu));

        return $affectedLines;
    }
    
    public function updateArticle($articleID, $titre, $contenu)
    {
        $db = $this->dbConnect();
        $articles = $db->prepare('UPDATE articles set title=?, content=? WHERE id=?');
        $affectedLines = $articles->execute(array($titre, $contenu, $articleID));

        return $affectedLines;
    }

    
    public function supprimer_billets($postId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE FROM articles WHERE id = ?');
        $q->execute(array($postId));
    }


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_auteur;charset=utf8', 'root', '');
        return $db;
    }
}