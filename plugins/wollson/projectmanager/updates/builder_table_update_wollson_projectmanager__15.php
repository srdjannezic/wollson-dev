<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanager15 extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->text('cover_media')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->dropColumn('cover_media');
        });
    }
}
