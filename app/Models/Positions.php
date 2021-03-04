<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Positions
 * @package App\Models
 * @version March 3, 2021, 11:45 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $workers
 * @property int $id
 * @property string $type
 * @property string $name
 */
class Positions extends Model
{
    use SoftDeletes;

    public $table = 'positions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required|string|max:20',
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function workers()
    {
        return $this->hasMany(\App\Models\Workers::class, 'position_id');
    }
}
