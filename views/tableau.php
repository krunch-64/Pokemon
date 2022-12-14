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
                <img src="./assets/img/logo-2.png" alt="">
            </a>
            <div class="tableau">
                <?php 
                    if(count($tableJoueur) != 0)
                    {
                        ?>
                            <table>
                                <tr> <th>Date</th> <th>Score</th> <th>Adversaire</th> </tr>
                                <?php
                                for ($i=0; $i < count($tableJoueur); $i++)
                                {
                                    ?>
                                    <tr> <td><?=$tableJoueur[$i]->getDate()?></td> <td><?= $tableJoueur[$i]->getScore() ?>-1</td> <td><?= $tableJoueur[$i]->getNameJoueur() ?></td> </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        <?php
                    }
                    else
                    {
                        echo '<div class="paragraphe"><p>Aucun Score</p></div> ';
                    }
                ?>
            </div>
            <div class="button">
                <a href="./index.php"><button class="first attacks_window__content__btn btn">Retour</button></a>
            </div>
        </div>
    </div>
</body>
</html>