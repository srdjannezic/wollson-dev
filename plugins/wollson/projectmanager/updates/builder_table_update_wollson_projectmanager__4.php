<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanager4 extends Migration
{
    public function up()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->text('media')->nullable();
            $table->text('gallery')->nullable();
            $table->dropColumn('image');
            $table->dropColumn('video');
        });
    }
    
    public function down()
    {
        Schema::table('wollson_projectmanager_', function($table)
        {
            $table->dropColumn('media');
            $table->dropColumn('gallery');
            $table->text('image')->nullable();
            $table->text('video')->nullable();
        });
    }
}
