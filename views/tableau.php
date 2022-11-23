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
            <a href="./index.php">
                <img src="./assets/img/logo.png" alt="">
            </a>
            <div class="tableau">
                <table>
                    <tr> <th>Date</th> <th>Score</th> <th>Adversaire</th> </tr>
                    <?php
                    for ($i=0; $i < count($tableJoueur); $i++)
                    {
                        ?>
                        <tr> <td><?=$tableJoueur->getDate()?></td> <td><?= $tableJoueur->getScore() ?></td> <td><?= $tableJoueur->getNameJoueur() ?></td> </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div class="buttons">
                <a href="./index.php"><button class="first">Retour</button></a>
            </div>
        </div>
    </div>
</body>
</html>