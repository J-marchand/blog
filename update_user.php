<?php

session_start();

include 'application/bdd-connexion.php';

$pdo->exec('SET NAME UTF8');     


    if($_POST == true){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $role = $_POST['role'];;
        $id = $_POST['profiId'];

        $pdo->exec('SET NAME UTF8');    
        var_dump('1');
        $query = $pdo->prepare
        ('UPDATE
            `user` 
        SET
            `firstName`=?,`lastName`=?,`role`=?
        WHERE
            id=?');

        $query->execute([$firstName, $lastName, $role, $id]);

        var_dump('2');


        header('location: profil.php');
        exit();
    }
    