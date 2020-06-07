<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanager5 extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->text('size')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->dropColumn('size');
        });
    }
}
