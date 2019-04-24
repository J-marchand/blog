<?php

session_start();

include 'application/bdd-connexion.php';

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    mail
FROM
    user');

$query->execute();

$allMailUser = $query->fetchAll(PDO::FETCH_ASSOC); 

$currentMail = $_POST['mail'];

$pasla = false;


for($i = 0; $i < count($allMailUser); $i++){ 
    if(in_array($currentMail, $allMailUser[$i])){

        $pasla = true;
    }
}
    
if($pasla == false){

    if($_POST == true){

        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $role = "user";

        $pdo->exec('SET NAME UTF8');    

        $query = $pdo->prepare
        ('INSERT INTO
            `user`(`firstName`, `lastName`, `mail`, `password`, `role`) 
        VALUES 
            (?, ?, ?, ?, ?)');

        $query->execute([$firstName, $lastName, $mail, $password, $role]);

        header('location: user.php');
        exit();
    }
    
} else {

    echo '<META http-equiv="refresh" content="0; URL=user.php">';
    echo '<script> alert("Adresse mail deja utilisé") </script>';    
}