<?php

namespace App\Repositories;

use App\Models\Distribuidor;
use App\Repositories\BaseRepository;

/**
 * Class DistribuidorRepository
 * @package App\Repositories
 * @version June 8, 2021, 6:21 pm UTC
*/

class DistribuidorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tie_id',
        'dis_nombre',
        'dis_direccion',
        'dis_correo',
        'dis_telefono'
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
        return Distribuidor::class;
    }
}
