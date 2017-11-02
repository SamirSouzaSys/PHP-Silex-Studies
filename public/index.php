<?php
require __DIR__ . "/../vendor/autoload.php";

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Application();

$app->get('/', function () {
    return "Helllo world com Silex";
});

/*
- Aplicação
Before, After, Finish
*/
/*$app->before(function (Request $request) {
    print "Middleware Before - ";
});

$app->after(function (Request $request, Response $response) {
    print "Middleware After - ";
});

$app->finish(function () {
    print "Middleware Finish - LogSaved";
});*/

$app->get('/categories/{slug}', function ($slug) {
    return "Categoria: " . $slug;
})
    ->value('slug', 'Valor default')
    ->convert('slug', function ($slug) {
        return (int)$slug;
    })

    /* Aula 4 - Middlewares
    - Rotas
    Before, After
    */
    ->before(function (Request $request) {
        print "Middleware Main Route Categories 1 - ";
    })
    ->before(function (Request $request) {
        print "Middleware Main Route Categories 2 - ";
    })
    ->after(function (Request $request, Response $response) {
        print "Middleware Main Route After - ";
    });


$app->run();