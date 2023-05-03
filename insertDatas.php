<?php

use GuzzleHttp\Client;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'HandleUsers.php';

/**
 * On récupère les données d'une api stockée sur mockaroo.com
 */
$httpClient = new Client();
$url = "https://my.api.mockaroo.com/users_composer.json?key=da14fd70";
$response = $httpClient->request('GET', $url, ['verify' => false]);
$users = json_decode($response->getBody());

dump($users); // un tableau d'objets (StdClass)

/**
 * on enregistre les données en bdd
 */
$handleUsers = new HandleUsers();
$handleUsers->saveUsersFromApi($users);
