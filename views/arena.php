<?php 
    
    $_SESSION['pkmn1_name'] = $tablePokemonUser[$_SESSION['pkmn1_increment']]->getName();
    $_SESSION['pkmn2_name'] = $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getName();
    
    $_SESSION['pkmn1_img_front']= $tablePokemonUser[$_SESSION['pkmn1_increment']]->getImg_front();
    $_SESSION['pkmn1_img_back']= $tablePokemonUser[$_SESSION['pkmn1_increment']]->getImg_back();
    $_SESSION['pkmn2_img_front']= $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getImg_front();
    $_SESSION['pkmn2_img_back']= $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getImg_back();


    $_SESSION['pkmn1_health_base'] = $tablePokemonUser[$_SESSION['pkmn1_increment']]->getHp();
    $_SESSION['pkmn2_health_base'] = $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getHp();


    $_SESSION['pkmn1_health'] = $tablePokemonUser[$_SESSION['pkmn1_increment']]->getHp();
    $_SESSION['pkmn2_health'] = $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getHp();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/output.css">

</head>
<body id="arena">
    <div class="fight_window">

        <div class="fight_window__player_space2">
            <div class="fight_window__player_space2__infos">
                <div id="toAddPKMN2" class="fight_window__player_space2__infos__stats">
                    
                </div>
                <div class="fight_window__player_space2__infos__ground">
                    <div id="pokemon2" class="pokemon-div pokemon2">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="fight_window__player_space1">
            <div class="fight_window__player_space1__infos">
                <div class="fight_window__player_space1__infos__ground">
                    <div id="pokemon1" class="pokemon-div pokemon1">
                        
                    </div>
                    </div>
                    <div id="toAddPKMN1" class="fight_window__player_space1__infos__stats stats-hp-100">
                    
                    
                </div>
                
                
            </div>
        </div>

    </div>
    <div class="attacks_window">
        <div class="attacks_window__content_base">
            <div id="menu-arena-1" class="">
                <button class="attacks_window__content__btn btn" id="btn-attack">Attaque</button>
                <button class="attacks_window__content__btn btn" id="btn-pkmn">Pokemon</button>
                <button class="attacks_window__content__btn btn" id="btn-quit">Abandonner</button>
            </div>
            <div id="menu-arena-2" class="d-none">
                <button class="attacks_window__content__btn btn" id="btn-attack1">Attaque 1</button>
                <button class="attacks_window__content__btn btn" id="btn-back1">Retour</button>
            </div>
            <div id="menu-arena-3" class="d-none">
                <button class="attacks_window__content__btn btn" id="btn-pkmn1">Pokemon 1</button>
                <button class="attacks_window__content__btn btn" id="btn-pkmn2">Pokemon 2</button>
                <button class="attacks_window__content__btn btn" id="btn-back2">Retour</button>
            </div>
            <div id="menu-arena-4" class="d-none">
                <a href="../index.php"><button class="attacks_window__content__btn btn">Oui</button></a>

                <button class="attacks_window__content__btn btn" id="btn-back3">Retour</button>
            </div>
            
        </div>

    </div>
    <div id="test">
        
    </div>
    <div id="test2">
        
    </div>

    
</body>
<script src="./assets/js/script.js"></script>
</html>
