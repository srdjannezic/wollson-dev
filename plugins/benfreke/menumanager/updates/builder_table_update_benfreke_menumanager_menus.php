<?php namespace BenFreke\MenuManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBenfrekeMenumanagerMenus extends Migration
{
    public function up()
    {
        Schema::table('benfreke_menumanager_menus', function($table)
        {
            $table->string('menu_item_class', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('benfreke_menumanager_menus', function($table)
        {
            $table->dropColumn('menu_item_class');
        });
    }
}
