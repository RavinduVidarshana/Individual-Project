<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $imageUrl
 * @property boolean    $isPrimary
 * @property int        $event_id
 */
class EventImage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event_image';

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
        'imageUrl', 'isPrimary', 'event_id'
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
        'imageUrl' => 'string', 'isPrimary' => 'boolean', 'event_id' => 'int'
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
