<?php
require_once __DIR__ . '/vendor/autoload.php';


echo "Create Db";

$pdo = new PDO("mysql:host=localhost;port=3306;charset=utf8", "toto", "toto");

dump($pdo);


$sql = "CREATE DATABASE IF NOT EXISTS composer_users";

$stmt = $pdo->prepare($sql);
$stmt->execute();
