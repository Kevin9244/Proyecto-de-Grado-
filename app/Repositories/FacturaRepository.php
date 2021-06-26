<?php

namespace App\Repositories;

use App\Models\Factura;
use App\Repositories\BaseRepository;

/**
 * Class FacturaRepository
 * @package App\Repositories
 * @version June 8, 2021, 10:45 pm UTC
*/

class FacturaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tie_id',
        'per_id',
        'pro_id',
        'fac_numero_facturas',
        'fac_fecha',
        'fac_iva',
        'fac_descuento'
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
        return Factura::class;
    }
}
