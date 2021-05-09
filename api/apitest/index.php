<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '../../../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('/apitest'); // Because we are working within a folder

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Welcom to the test api");
    return $response;
});

$app->get('/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();

?>