<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/PostEntity.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addArticle($titre, $contenu)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->addArticle($titre, $contenu);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function addArticlePOO(PostEntity $article)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->add($article);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function updateArticle($articleID, $titre, $contenu)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->updateArticle($articleID, $titre, $contenu);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function signaler($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->signaler($commentID);
    if ($affectedLines === false){
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else{
        header('Location: index.php?action=listPosts');
    }
}

function dessignaler($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->dessignaler($commentID);
    if ($affectedLines === false){
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else{
        header('Location: index.php?action=auteur');
    }
}

function supprimer_comment($commentID)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->supprimer_comment($commentID);
    if ($affectedLines === false){
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else{
        header('Location: index.php?action=auteur');
    }
}

function supprimer_billets($postId)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->supprimer_billets($postId);
    if ($affectedLines === false){
        throw new Exception('Impossible de supprimer l\'article !');
    }
    else{
        header('Location: index.php?action=auteur');
    }
}


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function vueConnexion()
{
    require('view/login.php');
}
function verificationAdmin()
{
    if(isset($_POST['connexion'])&& isset($_POST['mdp'])){
        //var_dump($_POST);
        require('view/connexion.php');
    } 
    
}
function biographieAuteur()
{
    require('view/biographie.php');
}
function administration()
{
    require('view/administration.php');
}
function redaction()
{
    require('view/rediger_news.php');
}