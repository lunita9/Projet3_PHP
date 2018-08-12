<?php
 class CommentEntity
 {
     private $ID;
     private $articleID;
     private $author;
     private $comment;
     private $date;
     
     
     
     
     function setId($id)
     {
         $this->ID=$id;
     }
     function setArticleID($article_id)
     {
         $this->articleID=$article_id;
     }
     function setAuthor($auteur)
     {
         $this->author=$auteur;
     }
     function setComment($commentaire)
     {
         $this->comment=$commentaire;
     }
     function setDate($dateAjoutee)
     {
         $this->dates=$dateAjoutee;
     }
     
     
     function getId()
     {
         return $this->ID;
     }
     function getArticleID()
     {
         return $this->articleID;
     }
     function getAuthor()
     {
         return $this->author;
     }
     function getComment()
     {
         return $this->comment;
     }
     function getDate()
     {
         return $this->dates;
     }
 }