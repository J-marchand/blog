<?php 

session_start();

include 'application/bdd-connexion.php';

/* ARTCILEs */

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    post');

$query->execute();

$allPost = $query->fetchAll(PDO::FETCH_ASSOC);

/* CATEGORY */

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    category');

$query->execute();

$allCategory = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($allCategory);



$template = 'www/change_post';
include 'layout.phtml';

?>