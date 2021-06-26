<?php

namespace App\Repositories;

use App\Models\TipoProducto;
use App\Repositories\BaseRepository;

/**
 * Class TipoProductoRepository
 * @package App\Repositories
 * @version June 8, 2021, 8:25 pm UTC
*/

class TipoProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dis_id',
        'tpro_descripcion',
        'tpro_estado'
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
        return TipoProducto::class;
    }
}
