<?php

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Slim\Factory\AppFactory;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$containerBuilder = new ContainerBuilder();

// $containerBuilder->addDefinitions([
//     EntityManager::class => function ($c) {
//         // $dbConfig = require __DIR__ . '/config/database.php';

//         var_dump($c);
//     }
// ]);

$container = $containerBuilder->build();

// AppFactory::setContainer($container);
// $app = AppFactory::create();


// for dependency injection
$app = \DI\Bridge\Slim\Bridge::create($container);

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

require __DIR__ . '/routes/api.php';

return $app;
