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
                <?php
                    for ($i=0; $i < count($tablePokemon); $i++)
                    {
                        echo $tablePokemon[$i]->getName() . "<br/>";
                        echo $tablePokemon[$i]->getid() ."<br>";
                        echo get_Sprites($tablePokemon[$i]->getid(), 'front');
                    }
                ?>
            </div>        
        </div>
    </div>
</body>
</html>