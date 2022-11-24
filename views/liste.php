<?php 
    include './controleurs/function.php';
    include './controleurs/CtrlList.php';
    //include './modeles/Joueur.php';
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
    <link rel="stylesheet" href="./assets/css/output.css">
</head>
<body id="accueil">
    <div class="acueil_all">
        <form class="block" method="POST" action='./index.php?action=arena'>
            <a href="./index.php">
                <img src="./assets/img/logo-2.png" class="" alt="">
            </a>
            <h4>Choisissez 3 pokémons :</h4>
            <div class="liste">
                <?php list_offset($tablePokemon);?>
            </div>
            <div class="btn-list">
                <!-- <a href="index.php?action=list&amp;offset=<?= offset_previous(offset());  ?>" type="submit"><button >Précedent</button></a> -->
                <button type="submit">commencé</button>
                <!-- <a href="index.php?action=list&amp;offset=<?= offset_next(offset()); ?>" type="submit"><button >Suivant</button></a> -->
            </div>   
        </form>
    </div>
</body>
</html>

<?php 
function list_checkbox () 
{
    $table = [];

    for ($i=0 ; $i < 24 ; $i++) {
        if (isset($_POST[$i])) {
            $table += [$i];
            return $table;
        }
        
    }
    var_dump($table);
    
}

function list_offset($tablePokemon) 
{
    ?><?php for ($i = 2 ; $i < 18; $i = $i+3) : ?>
        <div class="card">
            <img class="img-list" src="<?= $tablePokemon[$i]->getImg_front(); ?>"/>
            <p style="line-height:65px;" class="text-list"><?= $tablePokemon[$i]->getName() ?></p>
            <input type="checkbox" name="<?= $tablePokemon[$i]->getId(); ?>">
        </div>

    <?php endfor; ?><?php
}





