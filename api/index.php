<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\common\Controller;

require '../app/bootstrap.php';

$app = AppFactory::create();

$app->setBasePath('/api'); // Because we are working within a folder

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Welcome to the Alien api");
    return $response;
});

$app->get('/aliens/{id}', function (Request $request, Response $response, $args) {
    
    $controller = new Controller(); // Initialises logging and environment variables
    $dbCon = new App\common\ApiDb();

    $alienService = new App\Services\Alien($dbCon, $controller->GetLog());
    
    $alien = $alienService->GetAlien($args['id']);
    $payload = json_encode($alien);
    $response->getBody()->write($payload);

    return $response->withHeader('Content-Type','application/json');
});

$app->run();

?>