<?php

use \Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class HumanMigration extends Migration
{
    public function up()
    {
        $this->schema->create('humans', function(Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
        });
    }
    
    public function down()
    {
        $this->schema->drop('widgets');
    }
}
