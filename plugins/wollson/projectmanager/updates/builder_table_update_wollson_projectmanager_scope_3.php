<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanagerScope3 extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_scope', function($table)
        {
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_scope', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
