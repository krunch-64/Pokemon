<?php 
    include_once './controleurs/function.php';
    include './controleurs/CtrlList.php';
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
        <div class="block">
            <a href="./index.php">
                <img src="./assets/img/logo-2.png" class="" alt="">
            </a>
            <h4>Choisissez 3 pokémons :</h4>
            <div class="liste">
                <?php list_offset(offset(),$tablePokemon);?>
            </div>

            <div class="buttons">
                <a href="index.php?action=list&amp;offset=<?= offset_previous(offset());  ?>"><button>Précedent</button></a>
                <a href="index.php?action=list&amp;offset=<?= offset_next(offset()); ?>"><button>Suivant</button></a>
            </div>

            <div class="buttons">
                <a href="./index.php?action=arena"><button class="btn-liste attacks_window__content__btn btn">Lancer le combat</button></a>
            </div>         
        </div>
       
    </div>
</body>
</html>

<?php 
function list_offset(int $offset,$tablePokemon) 
{
    $offset_max = $offset + 6 ;
    ?><?php for ($offset; $offset < $offset_max; $offset++) : ?>
        <div class="card">
            <img class="img-list" src="<?= $tablePokemon[$offset]->getImg_front(); ?>"/>
            <p style="line-height:65px;" class="text-list"><?= translate_name_pokemon($tablePokemon[$offset]->getName()) ?></p>
        </div>

    <?php endfor; ?><?php
    echo $offset;
}