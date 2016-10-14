<?php

// Define routes here
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/users', 'HumanController@index');

    $r->addRoute('GET', '/user/{id:\d+}', 'HumanController@show');

    $r->addRoute('POST', '/user', 'HumanController@store');

    $r->addRoute('PUT', '/user/{id:\d+}', 'HumanController@update');

    $r->addRoute('DELETE', '/user/{id:\d+}', 'HumanController@destroy');
});