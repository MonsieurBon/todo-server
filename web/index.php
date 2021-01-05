<?php

use Symfony\Component\HttpFoundation\Request;
use Tiny\App;
use Todo\Command\CommandRequestHandler;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/../config/container.php');
$container = $containerBuilder->build();

$app = new App();

$app->post("/api/command", function (Request $request) use ($container) {
    $handler = $container->get(CommandRequestHandler::class);
    return $handler->handle($request);
});

$app->run();
