<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWollsonProjectmanagerScope extends Migration
{
    public function up()
    {
        Schema::create('wollson_projectmanager_scope', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('wollson_projectmanager_scope');
    }
}
