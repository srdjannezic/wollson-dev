<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWollsonProjectmanagerProjectscopes extends Migration
{
    public function up()
    {
        Schema::create('wollson_projectmanager_projectscopes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('project_id');
            $table->integer('scope_id');
            $table->primary(['project_id','scope_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('wollson_projectmanager_projectscopes');
    }
}
