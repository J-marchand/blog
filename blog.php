<?php

session_start();

include 'application/bdd-connexion.php';

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    post');

$query->execute();

$allPost = $query->fetchAll(PDO::FETCH_ASSOC);


$template = "www/blog";
include "layout.phtml";

?>