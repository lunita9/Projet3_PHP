<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY ID DESC LIMIT 0, 5');

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
    
    public function add(PostEntity $post)
    {
        $q = $this->db->prepare('INSERT INTO articles(id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\')) VALUES(:id, :title, :content, :date)');

    $q->bindValue(':id', $post->getId());
    $q->bindValue(':title', $post->getTitle());
    $q->bindValue(':content', $post->getContent());
    $q->bindValue(':date', $post->getDate());
    

    $q->execute();
    }
    
    public function update(PostEntity $post)
    {
        $q = $this->db->prepare('UPDATE articles SET title = :title, content = :content, date = :date WHERE id = :id');

    $q->bindValue(':id', $post->getId());
    $q->bindValue(':title', $post->getTitle());
    $q->bindValue(':content', $post->getContent());
    $q->bindValue(':date', $post->getDate());
    

    $q->execute();
    }
    
    public function delete(PostEntity $post)
    {
        $this->db->exec('DELETE FROM articles WHERE id = '.$post->getId());
    }


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_auteur;charset=utf8', 'root', '');
        return $db;
    }
}