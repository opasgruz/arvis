<?php

namespace App\Repositories;

use App\Models\Filials;
use App\Repositories\BaseRepository;

/**
 * Class FilialsRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:45 am UTC
*/

class FilialsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return Filials::class;
    }
}
