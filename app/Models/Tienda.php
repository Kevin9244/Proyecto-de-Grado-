<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tienda
 * @package App\Models
 * @version June 8, 2021, 3:43 pm UTC
 *
 * @property string $tie_razon_social
 * @property string $tie_nombre
 * @property string $tie_direccion
 * @property integer $tie_telefono
 * @property string $tie_correo
 * @property integer $tie_pagina_web
 * @property integer $tie_ruc
 */
class Tienda extends Model
{
    //use SoftDeletes;

    public $table = 'tienda';
    protected $primaryKey='tie_id';
    public $timestamps=false;
    
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];



    public $fillable = [
        'tie_razon_social',
        'tie_nombre',
        'tie_direccion',
        'tie_telefono',
        'tie_correo',
        'tie_pagina_web',
        'tie_ruc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tie_id' => 'integer',
        'tie_razon_social' => 'string',
        'tie_nombre' => 'string',
        'tie_direccion' => 'string',
        'tie_telefono' => 'integer',
        'tie_correo' => 'string',
        'tie_pagina_web' => 'integer',
        'tie_ruc' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tie_razon_social' => 'required|string|max:150',
        'tie_nombre' => 'required|string|max:150',
        'tie_direccion' => 'required|string|max:150',
        'tie_telefono' => 'required|integer',
        'tie_correo' => 'required|string|max:150',
        'tie_pagina_web' => 'nullable|integer',
        'tie_ruc' => 'required|integer'
    ];

    
}
