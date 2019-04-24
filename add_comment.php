<?php

session_start();

include 'application/bdd-connexion.php';

if($_POST == true){

    $nickName   = $_POST['nickName'];
    $comment    = $_POST['comment'];
    $postId     = $_POST['postId'];
    

    $pdo->exec('SET NAME UTF8');    

    $query = $pdo->prepare
    ('INSERT INTO 
        `comment`(`content`, `nickName`, `publish_date`, `post_id`)
    VALUES 
        (?, ?, NOW(), ?)');

    $query->execute(array($comment, $nickName, $postId));



    header('location: show_post.php?id='.$postId.'');
        exit();
}

?>