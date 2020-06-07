<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanagerScope2 extends Migration
{
    public function up()
    {
        Schema::rename('wollson_projectmanager_category', 'wollson_projectmanager_scope');
    }
    
    public function down()
    {
        Schema::rename('wollson_projectmanager_scope', 'wollson_projectmanager_category');
    }
}
