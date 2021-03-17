<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $iddhamma_school_has_address
 * @property int        $address_id
 * @property int        $dhamma_school_id
 */
class DhammaSchoolHasAddress extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dhamma_school_has_address';

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
        'iddhamma_school_has_address', 'address_id', 'dhamma_school_id'
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
        'iddhamma_school_has_address' => 'int', 'address_id' => 'int', 'dhamma_school_id' => 'int'
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
