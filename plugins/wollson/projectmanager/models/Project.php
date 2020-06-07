<?php namespace Wollson\ProjectManager\Models;

use Model;

/**
 * Model
 */
class Project extends Model
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
    public $table = 'wollson_projectmanager_';

    /**
     * @var array Validation rules
     */

    protected $jsonable = ['gallery'];

    public $rules = [
    ];

    public $belongsToMany = [
        'scopes' => [
            'Wollson\ProjectManager\Models\Scope',
            'table' => 'wollson_projectmanager_projectscopes',
            'order' => 'name',
        ]
    ];


    public function beforeSave(){
        $this->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->title)));
    }
}
