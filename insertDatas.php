<?php

use GuzzleHttp\Client;

require_once __DIR__ . '/vendor/autoload.php';

$httpClient = new Client();
$url = "https://my.api.mockaroo.com/users_composer.json?key=da14fd70";
$response = $httpClient->request('GET', $url, ['verify' => false]);

$users = json_decode($response->getBody());


dump($users);
$pdo = new PDO("mysql:host=localhost;dbname=composer_users;port=3306;charset=utf8", "toto", "toto");
$sql = "INSERT INTO users (`first_name`,`last_name`,`email`,`gender`,`ip_address`)
 VALUES (:first_name,:last_name,:email,:gender,:ip_address)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ":first_name" => "Toto",
    ":last_name" => "TOTO",
    ":email" => "toto@toto.fr",
    ":gender" => "M",
    ":ip_address" => "001.111.222.255"
]);
