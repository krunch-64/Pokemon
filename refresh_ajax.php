<?php 
    session_start(); 
    include_once ('./modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tablePokemonUser = $dao->getListePokemonUser();
    $tablePokemonComputer = $dao->getListePokemonComputer();
    
    // fermeture de la connexion à MySQL
    unset($dao);
    if (isset($_SESSION['pkmn1_health']))

    {
        if ($_SESSION['pkmn1_health'] <= 0)
            
        {
            $_SESSION['pkmn1_increment'] += 1;
        
            $_SESSION['pkmn1_health'] += $tablePokemonUser[$_SESSION['pkmn1_increment']]->getHp();
            $_SESSION['pkmn1_img_front']= $tablePokemonUser[$_SESSION['pkmn1_increment']]->getImg_front();
            $_SESSION['pkmn1_img_back']= $tablePokemonUser[$_SESSION['pkmn1_increment']]->getImg_back();
            
        }
        if ($_SESSION['pkmn2_health'] <= 0)
            
        {
            $_SESSION['pkmn2_increment'] += 1;
        
            $_SESSION['pkmn2_health'] += $tablePokemonUser[$_SESSION['pkmn2_increment']]->getHp();
            $_SESSION['pkmn2_img_front']= $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getImg_front();
            $_SESSION['pkmn2_img_back']= $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getImg_back();
            
        }
    }




?>