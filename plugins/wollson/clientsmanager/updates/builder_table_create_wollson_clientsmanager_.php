<?php namespace Wollson\ClientsManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWollsonClientsmanager extends Migration
{
    public function up()
    {
        Schema::create('wollson_clientsmanager_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('wollson_clientsmanager_');
    }
}
