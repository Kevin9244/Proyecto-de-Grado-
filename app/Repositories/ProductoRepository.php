<?php

namespace App\Repositories;

use App\Models\Producto;
use App\Repositories\BaseRepository;

/**
 * Class ProductoRepository
 * @package App\Repositories
 * @version June 8, 2021, 8:33 pm UTC
*/

class ProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tpro_id',
        'pro_codigo',
        'pro_descripcion',
        'pro_marca',
        'pro_modelo',
        'pro_material',
        'pro_medida',
        'pro_capacidad',
        'pro_unidad',
        'pro_nivel_proteccion'
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
        return Producto::class;
    }
}
