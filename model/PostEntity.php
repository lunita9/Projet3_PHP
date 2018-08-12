<?php
 class PostEntity
 {
     private $ID;
     private $title;
     private $content;
     private $date;
     
     
     
     
     function setId($id)
     {
         $this->ID=$id;
     }
     function setTitre($titre)
     {
         $this->title=$titre;
     }
     function setContenu($contenu)
     {
         $this->content=$contenu;
     }
     function setDate($dateAjoutee)
     {
         $this->date=$dateAjoutee;
     }
     
     
     function getId()
     {
         return $this->ID;
     }
     function getTitre()
     {
         return $this->title;
     }
     function getContenu()
     {
         return $this->content;
     }
     function getDate()
     {
         return $this->date;
     }
 }