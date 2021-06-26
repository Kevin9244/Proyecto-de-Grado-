<?php

namespace App\Repositories;

use App\Models\Tienda;
use App\Repositories\BaseRepository;

/**
 * Class TiendaRepository
 * @package App\Repositories
 * @version June 8, 2021, 3:43 pm UTC
*/

class TiendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tie_razon_social',
        'tie_nombre',
        'tie_direccion',
        'tie_telefono',
        'tie_correo',
        'tie_pagina_web',
        'tie_ruc'
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
        return Tienda::class;
    }
}
