<?php
use App\Controllers\HumanController;
use Noodlehaus\Config;
use Symfony\Component\HttpFoundation\Request;

// load plugins
require_once __DIR__.'/../vendor/autoload.php';

// migration base class
require_once __DIR__.'/../database/Database.php';

// holds the dispatcher variable
require_once __DIR__.'/../routes.php';

// load all configs
$config = new Config(__DIR__ . '/../config');

$request = Request::createFromGlobals();

// initialize database
$db = new Database\Database($config);
$db->boot();

$router = new App\Router($dispatcher, $request);

echo $router->execute();



