<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanager extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->integer('scope_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('video');
            $table->dropColumn('scope_id');
        });
    }
}
