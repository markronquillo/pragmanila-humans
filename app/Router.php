<?php
namespace App;

class Router {
	
	/**
	 * Contains the method to run under a Controller
	 * Controller@method
	 * 
	 * @var string
	 */
	private $handler;	

	/**
	 * Contains all url variables
	 * 
	 * @var array
	 */
	private $variables;

	/**
	 * Dispatcher 
	 * @var 
	 */
	private $dispatcher;

	public function __construct($dispatcher) {
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Given the current url
	 * Parse the corresponding Controller@method to execute
	 * @return json | 
	 */
	public function execute() {
		// // Fetch method and URI from somewhere
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
		    $uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);

		$routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
		    case \FastRoute\Dispatcher::NOT_FOUND:
		    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
		    	// return json value for not found
		        break;
		    case \FastRoute\Dispatcher::FOUND:
		        $handler = $routeInfo[1];
		        $vars = $routeInfo[2];
		        $split = explode('@', $handler);

		        $controller = "\\App\\Controllers\\". $split[0];
		        $ctrl = new $controller;

		        return array($ctrl, $split[1])();
		        break;
		}
	}
}