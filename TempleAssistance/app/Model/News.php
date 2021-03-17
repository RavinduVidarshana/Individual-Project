<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $title
 * @property string     $description
 * @property DateTime   $publishDate
 * @property int        $temple_id
 * @property boolean    $isActive
 * @property boolean    $isApproved
 */
class News extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
        'title', 'description', 'publishDate', 'temple_id', 'isActive', 'isApproved'
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
        'title' => 'string', 'description' => 'string', 'publishDate' => 'datetime', 'temple_id' => 'int', 'isActive' => 'boolean', 'isApproved' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'publishDate'
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
