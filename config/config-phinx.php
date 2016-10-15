<?php

return [
	'paths' => [
    	'migrations' => 'database/migrations'
  	],
  	'migration_base_class' => '\Database\Migrations\Migration',
  	'environments' => [
    	'default_migration_table' => 'phinxlog',
    	'default_database' => 'dev',
    	'dev' => [
      		'adapter' => 'sqlite',
      		'name' => __DIR__.'/../database/database.sqlite',
      		'prefix' => ''
    	]
  	]
];
