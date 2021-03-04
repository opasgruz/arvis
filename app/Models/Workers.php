<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Workers
 * @package App\Models
 * @version March 3, 2021, 11:45 am UTC
 *
 * @property \App\Models\Filials $filial
 * @property \App\Models\Positions $position
 * @property integer $id
 * @property integer $filial_id
 * @property integer $position_id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $fio
 */
class Workers extends Model
{
    use SoftDeletes;

    public $table = 'workers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $appends = ['fio'];

    public $fillable = [
        'filial_id',
        'position_id',
        'firstname',
        'middlename',
        'lastname'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'filial_id' => 'integer',
        'position_id' => 'integer',
        'firstname' => 'string',
        'middlename' => 'string',
        'lastname' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'filial_id' => 'required|integer',
        'position_id' => 'required|integer',
        'firstname' => 'required|string|max:255',
        'middlename' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function filial()
    {
        return $this->belongsTo(\App\Models\Filials::class, 'filial_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function position()
    {
        return $this->belongsTo(\App\Models\Positions::class, 'position_id');
    }

    /**
     * @return string
     **/
    public function getFioAttribute()
    {
        $fio_array = [];
        if ($this->lastname) {
            $fio_array[] = $this->lastname;
        }
        if ($this->firstname) {
            $fio_array[] = $this->firstname;
        }
        if ($this->middlename) {
            $fio_array[] = $this->middlename;
        }

        return implode(' ', $fio_array);
    }

}
