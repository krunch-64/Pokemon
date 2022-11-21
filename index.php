<?php 
include 'vendor/autoload.php';

function get_pokemon_list() {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon');

    //echo $response->getStatusCode(); // 200
    //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
    $body =  $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
    $parsed_json = json_decode($body);
    var_dump($parsed_json->{'next'});
    echo '<hr>';
    var_dump($parsed_json->{'previous'});
    echo '<hr>';
    $pokemons =  $parsed_json->{'results'};
    foreach($pokemons as $pokemon) {
        //var_dump($pokemon) ;
        $url = $pokemon->{'url'};
        $name = $pokemon->{'name'};
        ?> <img alt='<?= $name ?>' src="<?= get_front_Sprites($url) ?>">
        <p><?= translate_name_pokemon($name) ?></p><?php 
        
    }
    ?><button href="">précedent</button> 
    <button href="">suivant</button> <?php
    echo '<hr>';
};

get_pokemon_list();

/** La fonction get_front_sprites permet de récupré la front sprites d'un pokemon
 * @param string $url lien page d'un pokemon 
 * @return string $url
 */
function get_front_Sprites (string $url) 
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', $url);
    $response = $response->getBody();
    $parsed_json = json_decode($response);
    return $parsed_json->{'sprites'}->{'front_default'};
}

/** la fonction get_pokemon_stat permet de récupré les stats néssésaire pour crée une class pokemon
 * @param string $url
 */
function get_pokemon_stat(string $name)
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET','https://pokeapi.co/api/v2/pokemon/'.$name);
    $response = $response->getBody();
    $parsed_json = json_decode($response);

    $name = translate_name_pokemon($name);
    $element = [$parsed_json->{'types'}[0]->{'type'}->{'name'},$parsed_json->{'types'}[1]->{'type'}->{'name'}];
    $pv = $parsed_json->{'stats'}[0]->{'base_stat'};
    $attack = $parsed_json->{'stats'}[1]->{'base_stat'};
    $defense = $parsed_json->{'stats'}[2]->{'base_stat'};
    $special_attack = $parsed_json->{'stats'}[3]->{'base_stat'};
    $special_defense = $parsed_json->{'stats'}[4]->{'base_stat'};
    $speed = $parsed_json->{'stats'}[5]->{'base_stat'};
}


/** la fonction translate_name_pokemon permet de traduire le nom de pokemon en anglais en français
 * @param string $name pokemon in english
 * @return string $name in french
 */
function translate_name_pokemon (string $name) 
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET','https://pokeapi.co/api/v2/pokemon/'.$name);
    $parsed_json = json_decode($response->getBody());
    $response = $client->request('GET',$parsed_json->{'species'}->{'url'});
    $parsed_json = json_decode($response->getBody());
    return $parsed_json->{'names'}[4]->{'name'};
}