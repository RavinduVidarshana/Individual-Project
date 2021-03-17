<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $welfareName
 * @property string     $welfareRegnum
 * @property int        $welfareMemberCount
 * @property string     $welfarePresident
 * @property string     $welfareSecretary
 * @property string     $welfareTreasure
 * @property int        $temple_id
 */
class Welfare extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'welfare';

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
        'welfareName', 'welfareRegnum', 'welfareMemberCount', 'welfarePresident', 'welfareSecretary', 'welfareTreasure', 'temple_id'
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
        'welfareName' => 'string', 'welfareRegnum' => 'string', 'welfareMemberCount' => 'int', 'welfarePresident' => 'string', 'welfareSecretary' => 'string', 'welfareTreasure' => 'string', 'temple_id' => 'int'
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
