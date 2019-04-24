<?php

session_start();

var_dump($_POST);

include 'application/bdd-connexion.php';

if($_POST == true){

    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $subject    = $_POST['subject'];
    $content    = $_POST['content'];
    $mail       = $_POST['mail'];

    $pdo->exec('SET NAME UTF8');    

    $query = $pdo->prepare
    ('INSERT INTO 
        `message`(`fisrtName`, `lastName`, `subject`, `content`, `sendDate`, `mail`)
    VALUES 
        (?, ?, ?, ?, NOW(), ?)');

    $query->execute(array($firstName, $lastName, $subject, $content, $mail));


    echo '<META http-equiv="refresh" content="0; URL=blog.php">';
    echo '<script> alert("Votre message a bien été envoyé") </script>';

}