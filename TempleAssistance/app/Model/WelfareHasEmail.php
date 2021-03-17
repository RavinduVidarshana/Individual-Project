<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $email_id
 * @property int        $welfare_id
 */
class WelfareHasEmail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'welfare_has_email';

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
        'email_id', 'welfare_id'
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
        'email_id' => 'int', 'welfare_id' => 'int'
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
