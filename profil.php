<?php

session_start();

include 'application/bdd-connexion.php';



/* CATEGORY */
$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    category');

$query->execute();

$allCategory = $query->fetchAll(PDO::FETCH_ASSOC);

/* USER */

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    user
WHERE
    `role` = "user"');

$query->execute();

$allUser = $query->fetchAll(PDO::FETCH_ASSOC);

/* MODO */
$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    user
WHERE
    `role` = "moderateur"');

$query->execute();

$allModo = $query->fetchAll(PDO::FETCH_ASSOC);

/* ADMIN */

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    user
WHERE
    `role` = "admin"');

$query->execute();

$allAdmin = $query->fetchAll(PDO::FETCH_ASSOC);

/* WRITER */

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    user
WHERE
    `role` = "writer"');

$query->execute();

$allWriter = $query->fetchAll(PDO::FETCH_ASSOC);

$template = "www/profil";
include "layout.phtml";

return $allCategory;
?>