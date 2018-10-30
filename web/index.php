<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Tiny\App;

require_once __DIR__.'/../vendor/autoload.php';

$app = new App();

$app->get("/hello[/{name}]", function(Request $request) {
    $name = $request->get('name', 'World');

    return new Response(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));
});

$app->run();
