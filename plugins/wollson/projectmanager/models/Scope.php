<?php namespace Wollson\ProjectManager\Models;

use Model;

/**
 * Model
 */
class Scope extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'wollson_projectmanager_scope';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'project' => [
            'Wollson\ProjectManager\Models\Project',
            'table' => 'wollson_projectmanager_projectscopes'
        ],
    ];

    // public $hasMany = [
    //     'id' => [
    //         'Wollson\ProjectManager\Models\Project',
    //         'table' => 'wollson_projectmanager_scope'
    //     ]
    // ];

    // public $belongsTo = [
    //     'parent' => [
    //         'Wollson\ProjectManager\Models\Scope',
    //         'table' => 'wollson_projectmanager_scope',
    //         'key'=>'parent_id'
    //     ]
    // ];

}
