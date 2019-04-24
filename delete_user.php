<?php

session_start();

include 'application/bdd-connexion.php';

$id = $_POST['profiId'];

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('DELETE FROM 
    `user` 
WHERE
    id=?');

$query->execute([$id]);

header('location: profil.php');
    exit(); 