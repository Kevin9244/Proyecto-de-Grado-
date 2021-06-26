<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 * @package App\Models
 * @version June 8, 2021, 8:33 pm UTC
 *
 * @property \App\Models\TipoProducto $tpro
 * @property \Illuminate\Database\Eloquent\Collection $facturas
 * @property \Illuminate\Database\Eloquent\Collection $inventarios
 * @property integer $tpro_id
 * @property integer $pro_codigo
 * @property string $pro_descripcion
 * @property string $pro_marca
 * @property string $pro_modelo
 * @property string $pro_material
 * @property integer $pro_medida
 * @property integer $pro_capacidad
 * @property integer $pro_unidad
 * @property integer $pro_nivel_proteccion
 */
class Producto extends Model
{
   
    public $table = 'producto';
    protected $primaryKey='pro_id';
    public $timestamps=false;
  

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pro_id' => 'integer',
        'tpro_id' => 'integer',
        'pro_codigo' => 'integer',
        'pro_descripcion' => 'string',
        'pro_marca' => 'string',
        'pro_modelo' => 'string',
        'pro_material' => 'string',
        'pro_medida' => 'integer',
        'pro_capacidad' => 'integer',
        'pro_unidad' => 'integer',
        'pro_nivel_proteccion' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tpro_id' => 'required|integer',
        'pro_codigo' => 'required|integer',
        'pro_descripcion' => 'required|string',
        'pro_marca' => 'required|string',
        'pro_modelo' => 'nullable|string',
        'pro_material' => 'required|string',
        'pro_medida' => 'required|integer',
        'pro_capacidad' => 'nullable|integer',
        'pro_unidad' => 'required|integer',
        'pro_nivel_proteccion' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tpro()
    {
        return $this->belongsTo(\App\Models\TipoProducto::class, 'tpro_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function facturas()
    {
        return $this->hasMany(\App\Models\Factura::class, 'pro_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inventarios()
    {
        return $this->hasMany(\App\Models\Inventario::class, 'pro_id');
    }
}
