<?php

namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{

	/**
	 * Config object
	 * 
	 * @var \Noodlehaus\Config
	 */
	private $config;

	// inject config
	public function __construct(\Noodlehaus\Config $config) {
		$this->config = $config;
	}

	/**
	 * Initialize Eloquent ORM
	 * @return [type] [description]
	 */
	public function boot() 
	{
		$capsule = new Capsule;
		$capsule->addConnection($this->config['sqlite']);
		$capsule->bootEloquent();
		$capsule->setAsGlobal();
	}
}