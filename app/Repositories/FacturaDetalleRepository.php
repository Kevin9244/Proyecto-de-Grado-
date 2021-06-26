<?php

namespace App\Repositories;

use App\Models\FacturaDetalle;
use App\Repositories\BaseRepository;

/**
 * Class FacturaDetalleRepository
 * @package App\Repositories
 * @version June 8, 2021, 10:45 pm UTC
*/

class FacturaDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tie_id',
        'per_id',
        'pro_id',
        'fac_numero_facturas',
        'fac_fecha'
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
        return FacturaDetalle::class;
    }
}
