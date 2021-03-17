<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $templeName
 * @property string     $templeInfo
 * @property string     $mainMonk
 * @property string     $longitude
 * @property string     $latitude
 * @property int        $monkCount
 * @property int        $vegMonkCount
 * @property int        $nonVegMonkCount
 * @property int        $temple_category_id
 * @property boolean    $isApproved
 */
class Temple extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'temple';

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
        'templeName', 'templeInfo', 'mainMonk', 'longitude', 'latitude', 'monkCount', 'vegMonkCount', 'nonVegMonkCount', 'temple_category_id', 'isApproved'
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
        'templeName' => 'string', 'templeInfo' => 'string', 'mainMonk' => 'string', 'longitude' => 'string', 'latitude' => 'string', 'monkCount' => 'int', 'vegMonkCount' => 'int', 'nonVegMonkCount' => 'int', 'temple_category_id' => 'int', 'isApproved' => 'boolean'
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
