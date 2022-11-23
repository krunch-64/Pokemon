<?php
    include './controleurs/function.php';
    
    include_once ('./modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tablePokemon = $dao->get_pokemon_list();




function get_pokemon_list() {
    $max_offset = 24;
    $offset = 0;
    $result = request('https://pokeapi.co/api/v2/pokemon?offset='.$offset.'&limit=6');

    $pokemons =  $result->{'results'};
    foreach($pokemons as $pokemon) {

        $id = request('https://pokeapi.co/api/v2/pokemon/'.$pokemon->{'name'})->{'id'};
        $name = $pokemon->{'name'};
        ?> <div class="card ">
            <img alt='<?= $name ?>' src="<?= get_Sprites($id,'front') ?>">
            <p alt='<?= $id ?>'><?= translate_name_pokemon($name) ?></p>
        </div> <?php
    }
    ?><a href="<?php if ($offset >= 6){$offset = $offset - 6; }  ?>"><button>Précedent</button></a>
    <a href="<?php if ($offset < $max_offset){$offset += 6 ;} else {$offset = 6;}?>"><button>Suivant</button></a><?php
};
include_once('./views/liste.php');
?>
