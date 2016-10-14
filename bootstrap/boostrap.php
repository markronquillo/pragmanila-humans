<?php
use App\Controllers\HumanController;


// load plugins
require_once __DIR__.'/../vendor/autoload.php';

// holds the dispatcher variable
require_once __DIR__.'/../routes.php';

$router = new App\Router($dispatcher);

echo $router->execute();



