<?php 
include 'controleurs/CtrlList.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body id="accueil">
    <div class="acueil_all">
        <div class="block">
            <a href="./index.php?Accueil"><img src="/assets/img/logo.png" alt=""></a>
            <h4>Choisissez 3 pokémons :</h4>
            <div class="liste">
               <?= get_pokemon_list(); ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>