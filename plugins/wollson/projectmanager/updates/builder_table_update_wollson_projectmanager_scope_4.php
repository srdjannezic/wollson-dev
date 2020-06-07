<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanagerScope4 extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_scope', function($table)
        {
            $table->integer('parent_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_scope', function($table)
        {
            $table->dropColumn('parent_id');
        });
    }
}
