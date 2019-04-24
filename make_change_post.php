<?php 

session_start();

include 'application/bdd-connexion.php';

var_dump($_POST);

/* CHANGE ARTICLE */
$title      = $_POST['title'];
$content    = $_POST['content'];
$category   = $_POST['category'];
$id         = $_POST['id'];


$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('UPDATE 
    `post` 
SET 
    `content`=?,`title`=?,`category`=? 
WHERE 
    id= ?');

$query->execute(array($content, $title, $category, $id));

    header('location: blog.php');
    exit();

