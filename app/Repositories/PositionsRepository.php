<?php

namespace App\Repositories;

use App\Models\Positions;
use App\Repositories\BaseRepository;

/**
 * Class PositionsRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:45 am UTC
*/

class PositionsRepository extends BaseRepository
{

   const TYPE_ITR = 'itr';
   const TYPE_LINE = 'line';

   const TYPES = [
     self::TYPE_ITR => 'Инженерно-технический',
     self::TYPE_LINE => 'Линейный'
   ];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'name'
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
        return Positions::class;
    }
}
