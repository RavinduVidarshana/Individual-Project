<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $dhammaSchoolName
 * @property string     $dhammaSchoolRegnum
 * @property string     $dhammaSchoolPrinciple
 * @property int        $studentCount
 * @property int        $temple_id
 */
class DhammaSchool extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dhamma_school';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dhammaSchoolName', 'dhammaSchoolRegnum', 'dhammaSchoolPrinciple', 'studentCount', 'temple_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dhammaSchoolName' => 'string', 'dhammaSchoolRegnum' => 'string', 'dhammaSchoolPrinciple' => 'string', 'studentCount' => 'int', 'temple_id' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
