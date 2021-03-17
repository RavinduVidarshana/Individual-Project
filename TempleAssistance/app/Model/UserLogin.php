<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $userName
 * @property string     $password
 * @property int        $user_role_id
 * @property int        $temple_id
 * @property int        $welfare_id
 * @property int        $dhamma_school_id
 * @property int        $buddhist_followers_id
 * @property int        $user_id
 */
class UserLogin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_login';

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
        'userName', 'password', 'user_role_id', 'temple_id', 'welfare_id', 'dhamma_school_id', 'buddhist_followers_id', 'user_id'
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
        'userName' => 'string', 'password' => 'string', 'user_role_id' => 'int', 'temple_id' => 'int', 'welfare_id' => 'int', 'dhamma_school_id' => 'int', 'buddhist_followers_id' => 'int', 'user_id' => 'int'
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
