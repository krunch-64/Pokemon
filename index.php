<?php 
include 'vendor/autoload.php';

function test() {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon/');

    //echo $response->getStatusCode(); // 200
    //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
    $response =  $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
    echo $response['next'];
};

test();