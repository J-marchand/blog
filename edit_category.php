<?php

session_start();

include 'application/bdd-connexion.php';

$pdo->exec('SET NAME UTF8');    

$query = $pdo->prepare
('SELECT
    category
FROM
    category');

$query->execute();

$allCategory = $query->fetchAll(PDO::FETCH_ASSOC);

$currentCategory = $_POST['category'];

$pasla = false;

for($i = 0; $i < count($allCategory); $i++){ 
    if(in_array($currentCategory, $allCategory[$i])){

        $pasla = true;
    }
}
    if($pasla == false) {
        if($_POST == true){

            $category = $_POST['category'];


            $pdo->exec('SET NAME UTF8');    

            $query = $pdo->prepare
            ('INSERT INTO 
                `category`(`category`) 
            VALUES 
                (?)');

            $query->execute(array($category));

            header('location: profil.php');
            exit();
        }

    } else {


        echo '<META http-equiv="refresh" content="0; URL=user.php">';
        echo '<script> alert("Cette category existe déjà") </script>';
    } 

?>