<?php namespace Wollson\ProjectManager;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    		'Wollson\ProjectManager\Components\Projects'       => 'projects',
    		'Wollson\ProjectManager\Components\ProjectComponent'       => 'project'
    	];
    }
}
