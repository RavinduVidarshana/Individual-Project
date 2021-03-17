<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $dane_shedule_id
 * @property int        $buddhist_followers_id
 */
class DaneScheduleHasBf extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dane_schedule_has_bf';

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
        'dane_shedule_id', 'buddhist_followers_id'
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
        'dane_shedule_id' => 'int', 'buddhist_followers_id' => 'int'
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
