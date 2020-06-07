<?php namespace Wollson\GeneralPages\Models;

use Model;

/**
 * Model
 */
class GeneralPages extends Model
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
    public $table = 'wollson_generalpages_';

    public $jsonable = array('content','section_content','section_type');

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
