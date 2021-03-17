<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $eventName
 * @property string     $eventInfo
 * @property DateTime   $eventDateFrom
 * @property DateTime   $eventDateTo
 * @property boolean    $eventIsActive
 * @property string     $longitude
 * @property string     $latitude
 * @property int        $event_catergory_id
 * @property int        $event_organized_id
 * @property int        $temple_id
 * @property int        $welfare_id
 * @property int        $dhamma_school_id
 * @property boolean    $isApproved
 */
class Event extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event';

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
        'eventName', 'eventInfo', 'eventDateFrom', 'eventDateTo', 'eventIsActive', 'longitude', 'latitude', 'event_catergory_id', 'event_organized_id', 'temple_id', 'welfare_id', 'dhamma_school_id', 'isApproved'
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
        'eventName' => 'string', 'eventInfo' => 'string', 'eventDateFrom' => 'datetime', 'eventDateTo' => 'datetime', 'eventIsActive' => 'boolean', 'longitude' => 'string', 'latitude' => 'string', 'event_catergory_id' => 'int', 'event_organized_id' => 'int', 'temple_id' => 'int', 'welfare_id' => 'int', 'dhamma_school_id' => 'int', 'isApproved' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'eventDateFrom', 'eventDateTo'
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
