<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanager12 extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->text('position')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->dropColumn('position');
        });
    }
}
