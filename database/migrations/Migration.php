<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

require_once _DIR__.'/../../config/config.php';

class Migration extends AbstractMigration {

    /**
     * Capsule Object
     * @var \Illuminate\Database\Capsule\Manager
     */
    public $capsule;


    /**
     * Builder
     * @var \Illuminate\Database\Schema\Builder
     */
    public $schema;

    public function init()
    {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            $config['sqlite'];
        ]);
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }
}
