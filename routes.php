<?php

// Define routes here
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/humans', 'HumanController@index');

    $r->addRoute('GET', '/human/{id:\d+}', 'HumanController@show');

    $r->addRoute('POST', '/human', 'HumanController@store');

    $r->addRoute('PUT', '/human/{id:\d+}', 'HumanController@update');

    $r->addRoute('DELETE', '/human/{id:\d+}', 'HumanController@destroy');
});