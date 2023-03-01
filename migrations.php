<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use morlowsk\corephp\Application;
use morlowsk\corephp\Database;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DBN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);


$app->db->applyMigrations();
