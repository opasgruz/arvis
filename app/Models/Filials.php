<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Filials
 * @package App\Models
 * @version March 3, 2021, 11:45 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $workers
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $workersCount
 */
class Filials extends Model
{
    use SoftDeletes;

    public $table = 'filials';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $appends = ['workersCount'];

    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function workers()
    {
        return $this->hasMany(\App\Models\Workers::class, 'filial_id');
    }


    /**
     * @return integer
     **/
    public function getWorkersCountAttribute()
    {
        return (empty($this->workers)) ? 0 : $this->workers->count();
    }


    public function delete()
    {
        if (! empty($this->workers))
        {
            $this->workers->toQuery()->update(['filial_id' => null]);
        }
        return parent::delete();
    }
}
