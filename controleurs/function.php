<?php 
include './vendor/autoload.php';

function request(string $url)
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET',$url);
    return json_decode($response->getBody());
}

/** Les function offset permets de gére la pagination de la liste
 * @return int $offset
 */
function offset() {
    if(!isset($_GET['offset'])) {
        $offset = 0;
    }
    else {
        $offset = $_GET['offset'];
    }
    return $offset;
}

function offset_next($offset) {
    $offset_next = $offset;
    if ($offset >= 18) {
        $offset_next = 0;
    }
    else {
        $offset_next = $offset + 6;
    }
    return $offset_next;
}

function offset_previous($offset) {
    $offset_previous = $offset;
    if ($offset < 6) {
        $offset_previous = 0;
    }
    else {
        $offset_previous = $offset - 6;
    }
    return $offset_previous;
}




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

/*
    Si tu peux reprendre juste l'url de l'image comme ca je la stocke dans ma base de donnée
*/

/** la fonction get_pokemon_stat permet de récupré les stats néssésaire pour crée une class pokemon
 * @param string $id
 */
function get_pokemon_stat(string $id)
{
    $parsed_json = request('https://pokeapi.co/api/v2/pokemon/'.$id);


    $damage_relations = request($parsed_json->{'types'}[0]->{'type'}->{'url'})->{'damage_relations'} ;
    $double_damage_from = $damage_relations->{'double_damage_from'};
    $table_from = [];
    foreach ($double_damage_from as $key => $relation) {$table_from += [$key => $relation->{'name'}];}
    $table = [
    'id' =>  (int)$id,
    'name' => translate_name_pokemon($parsed_json->{'name'}),
    'element_primary' => $parsed_json->{'types'}[0]->{'type'}->{'name'},
    'pv' => $parsed_json->{'stats'}[0]->{'base_stat'},
    'attack' => $parsed_json->{'stats'}[1]->{'base_stat'},
    'defense' => $parsed_json->{'stats'}[2]->{'base_stat'},
    'double_damage_from' => $table_from,
    'image_front' => get_Sprites($id,'front'),
    'image_back' => get_Sprites($id,'back'),
    ];
    return $table;
}

// var_dump(get_pokemon_stat(1));
/** la fonction translate_name_pokemon permet de traduire le nom de pokemon en anglais en français
 * @param string $response page pokemon
 * @return string $name pokemon in french
 */
function translate_name_pokemon (string $name) 
{
    return  request(request('https://pokeapi.co/api/v2/pokemon/'.$name)->{'species'}->{'url'})->{'names'}[4]->{'name'};
}


