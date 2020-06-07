<?php namespace Wollson\EmployeesManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWollsonEmployeesmanager extends Migration
{
    public function up()
    {
        Schema::create('wollson_employeesmanager_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name', 255);
            $table->string('last_name', 255)->nullable();
            $table->string('profession', 255)->nullable();
            $table->text('image');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('wollson_employeesmanager_');
    }
}
