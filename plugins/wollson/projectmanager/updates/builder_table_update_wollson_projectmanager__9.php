<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanager9 extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->renameColumn('featured_title', 'featured_subtitle');
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->renameColumn('featured_subtitle', 'featured_title');
        });
    }
}
