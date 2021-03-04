<?php

namespace App\Repositories;

use App\Models\Workers;
use App\Repositories\BaseRepository;

/**
 * Class WorkersRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:45 am UTC
*/

class WorkersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'filial_id',
        'position_id',
        'firstname',
        'middlename',
        'lastname'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Workers::class;
    }
}
