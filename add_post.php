<?php

session_start();

include 'application/bdd-connexion.php';

if($_POST == true){

    $title      = $_POST['title'];
    $content    = $_POST['content'];
    $author     = $_SESSION['firstName'].' '.$_SESSION['lastName'];
    $category   = $_POST['category'];

    $pdo->exec('SET NAME UTF8');    

    $query = $pdo->prepare
    ('INSERT INTO 
        `post`(`author`, `content`, `publish_date`, `title`, `category`) 
    VALUES 
        (?, ?, NOW(), ?, ?)');

    $query->execute(array($author, $content, $title, $category));

    header('location: blog.php');
        exit();
}

?>