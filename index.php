<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use App\Error\Renderer\HtmlErrorRenderer;


require('error.php');
require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

// Create Twig
$twig = Twig::create('templates', ['cache' => false]);

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'home.phtml');
})->setName('home');

$app->get('/tour', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'tour.phtml');
})->setName('tour');

$app->get('*', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'home.phtml');
})->setName('all');



$displayErrorDetails = (bool)($_ENV['DEBUG'] ?? false);
$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, true, true);
$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->registerErrorRenderer('text/html', HtmlErrorRenderer::class);

  $app->run();