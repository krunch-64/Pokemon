<?php 
include '../vendor/autoload.php';

function request(string $url)
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET',$url);
    return json_decode($response->getBody());
}


function get_pokemon_list() {
    $result = request('https://pokeapi.co/api/v2/pokemon?offset=0&limit=24');

    $pokemons =  $result->{'results'};
    foreach($pokemons as $pokemon) {

        $id = request('https://pokeapi.co/api/v2/pokemon/'.$pokemon->{'name'})->{'id'};
        $name = $pokemon->{'name'};
        ?> <div class="card ">
            <img alt='<?= $name ?>' src="<?= get_Sprites($id,'front') ?>">
            <p alt='<?= $id ?>'><?= translate_name_pokemon($name) ?></p>
        </div> <?php 
    }
};

/** La fonction get_front_sprites permet de récupré la front sprites d'un pokemon
 * @param string $id d'un pokemon
 * @param string $frame 'front' ou 'back' 
 * @return string $url
 */
function get_Sprites (string $id,$frame) 
{
    $request = request('https://pokeapi.co/api/v2/pokemon/'.$id);
    if ($frame == 'front') {return $request->{'sprites'}->{'front_default'};}
    else if ($frame == 'back') {return $request->{'sprites'}->{'back_default'};}
    
}


/** la fonction get_pokemon_stat permet de récupré les stats néssésaire pour crée une class pokemon
 * @param string $id
 */
function get_pokemon_stat(string $id)
{
    $parsed_json = request('https://pokeapi.co/api/v2/pokemon/'.$id);


    $damage_relations = request($parsed_json->{'types'}[0]->{'type'}->{'url'})->{'damage_relations'} ;
    $double_damage_from = $damage_relations->{'double_damage_from'};
    $double_damage_to = $damage_relations->{'double_damage_to'};
    $table_from = [];
    foreach ($double_damage_from as $key => $relation) {$table_from += [$key => $relation->{'name'}];}
    $table_to = [];
    foreach ($double_damage_to as $key => $relation ) {$table_to += [$key => $relation->{'name'}];}
    $table = [
    'id' =>  (int)$id,
    'name' => $parsed_json->{'name'},
    'element_primary' => $parsed_json->{'types'}[0]->{'type'}->{'name'},
    'element_secondary' => $parsed_json->{'types'}[1]->{'type'}->{'name'},
    'pv' => $parsed_json->{'stats'}[0]->{'base_stat'},
    'attack' => $parsed_json->{'stats'}[1]->{'base_stat'},
    'defense' => $parsed_json->{'stats'}[2]->{'base_stat'},
    'double_damage_from' => $table_from,
    'double_damage_to' => $table_to,
    ];
    return $table;
}

var_dump(get_pokemon_stat(1));
/** la fonction translate_name_pokemon permet de traduire le nom de pokemon en anglais en français
 * @param string $response page pokemon
 * @return string $name pokemon in french
 */
function translate_name_pokemon (string $name) 
{
    return  request(request('https://pokeapi.co/api/v2/pokemon/'.$name)->{'species'}->{'url'})->{'names'}[4]->{'name'};
}


