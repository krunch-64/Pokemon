<?php 
include 'vendor/autoload.php';

function request(string $url)
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET',$url);
    return json_decode($response->getBody());
}

function get_pokemon_list() {
    $result = request('https://pokeapi.co/api/v2/');

    var_dump($result->{'next'});
    echo '<hr>';
    var_dump($result->{'previous'});
    echo '<hr>';
    $pokemons =  $result->{'results'};
    foreach($pokemons as $pokemon) {
        //var_dump($pokemon) ;
        $url = $pokemon->{'url'};
        $name = $pokemon->{'name'};
        ?> <img alt='<?= $name ?>' src="<?= get_front_Sprites($url) ?>">
        <p><?= translate_name_pokemon($name) ?></p><?php 
        
    }
    ?><button href="<?= request($result->{'previous'}) ?>">précedent</button> 
    <button href="<?= request($result->{'next'}) ?>">suivant</button> <?php
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