<?php
require __DIR__ . "/../vendor/autoload.php";

use Silex\Application;

$app = new Application();

$app->get('/', function () {
    return "Helllo world com Silex";
});

$app->get('/categories/{slug}', function ($slug) {
    return "Categoria: ".$slug ;
})
    ->value('slug','Valor default')
    ->convert('slug',function($slug){
    return (int)$slug;
});


$app->run();