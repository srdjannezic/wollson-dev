<?php namespace Wollson\ProjectManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonProjectmanagerCategory extends Migration
{
    public function up()
    {
        Schema::rename('wollson_projectmanager_scope', 'wollson_projectmanager_category');
    }
    
    public function down()
    {
        Schema::rename('wollson_projectmanager_category', 'wollson_projectmanager_scope');
    }
}
