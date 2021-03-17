<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $firstName
 * @property string     $lastName
 * @property string     $NIC
 * @property boolean    $isApproved
 */
class BuddhistFollowers extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'buddhist_followers';

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
        'firstName', 'lastName', 'NIC', 'isApproved'
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
        'firstName' => 'string', 'lastName' => 'string', 'NIC' => 'string', 'isApproved' => 'boolean'
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
