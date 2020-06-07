<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWollsonProjectmanager extends Migration
{
    public function up()
    {
        Schema::create('wollson_projectmanager_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('title');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('wollson_projectmanager_');
    }
}
