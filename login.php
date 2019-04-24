<?php

session_start();

include 'application/bdd-connexion.php';

if($_POST == true){

    $pdo->exec('SET NAME UTF8');

    $query = $pdo->prepare
    ('SELECT
        *
    FROM
        `user`
    WHERE
        `mail` =?');

    $query->execute([$_POST['mail']]);

    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    if($_POST['password'] == $user['password'] && $_POST['mail'] == $user['mail']){

        $_SESSION['id']          = $user['id'];
        $_SESSION['mail']        = $user['mail'];
        $_SESSION['password']    = $user['password'];
        $_SESSION['firstName']   = $user['firstName'];
        $_SESSION['lastName']    = $user['lastName'];
        $_SESSION['role']        = $user['role'];


        var_dump($_SESSION);

        if($_SESSION['role'] == 'admin'){ 

            header('location: profil.php');
            exit();
        } elseif($_SESSION['role'] == 'moderateur') {

            header('location: blog.php');
            exit();
        } elseif($_SESSION['role'] == 'writer') {

            header('location: profil.php');
            exit();
        } elseif ($_SESSION['role'] == 'user') {

            header('location: blog.php');
            exit();
        }
    } else {

        echo '<META http-equiv="refresh" content="0; URL=user.php">';
        echo '<script> alert("Mot de passe ou adresse mail incorect") </script>';
    } 
}