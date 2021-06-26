<?php

namespace App\Repositories;

use App\Models\Inventario;
use App\Repositories\BaseRepository;

/**
 * Class InventarioRepository
 * @package App\Repositories
 * @version June 8, 2021, 9:11 pm UTC
*/

class InventarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pro_id',
        'tie_id',
        'per_id',
        'inv_fecha',
        'inv_hora',
        'inv_cantidad',
        'inv_documento',
        'inv_serie'
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
        return Inventario::class;
    }
}
