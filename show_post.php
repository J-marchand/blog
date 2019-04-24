<?php

session_start();

include 'application/bdd-connexion.php';

/* ARTICLE BY ID */

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    *
FROM
    post
WHERE
    id = ?');

$query->execute([$_GET['id']]);

$postById = $query->fetch(PDO::FETCH_ASSOC);




/* COMMENT BY POST ID */

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    `comment`.`nickName`, `comment`.`publish_date`, `comment`.`content`  
FROM 
    `comment` 
INNER JOIN 
    `post` 
ON 
    `comment`.`post_id` = `post`.`id`
WHERE 
    `comment`.`post_id` = ?');

$query->execute([$_GET['id']]);

$commentById = $query->fetchAll(PDO::FETCH_ASSOC);  

$template ='www/show_post';
include 'layout.phtml';

?>