<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Date       $date
 * @property boolean    $isBook
 * @property int        $monkCount
 * @property int        $vegMonkCount
 * @property int        $nonVegMonkCount
 * @property int        $bfCount
 * @property int        $temple_id
 * @property int        $dane_time_id
 */
class DaneShedule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dane_shedule';

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
        'date', 'isBook', 'monkCount', 'vegMonkCount', 'nonVegMonkCount', 'bfCount', 'temple_id', 'dane_time_id'
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
        'date' => 'date', 'isBook' => 'boolean', 'monkCount' => 'int', 'vegMonkCount' => 'int', 'nonVegMonkCount' => 'int', 'bfCount' => 'int', 'temple_id' => 'int', 'dane_time_id' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date'
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
