<?php

use Slim\Factory\AppFactory;


$container = require __DIR__ . '/../bootstrap.php';


AppFactory::setContainer($container);
$app = AppFactory::create();

// for dependency injection
// $app = \DI\Bridge\Slim\Bridge::create($container);

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);

    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

require __DIR__ . '/../routes/api.php';

$app->run();
