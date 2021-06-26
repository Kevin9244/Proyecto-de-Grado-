<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Factura
 * @package App\Models
 * @version June 8, 2021, 10:44 pm UTC
 *
 * @property \App\Models\Persona $per
 * @property \App\Models\Producto $pro
 * @property \App\Models\Tienda $tie
 * @property \Illuminate\Database\Eloquent\Collection $facturaDetalles
 * @property integer $tie_id
 * @property integer $per_id
 * @property integer $pro_id
 * @property string $fac_numero_facturas
 * @property string $fac_fecha
 */
class Factura extends Model
{

    public $table = 'factura';
    protected $primaryKey='fac_id';
    public $timestamps=false;
    
    
 



    public $fillable = [
        'tie_id',
        'per_id',
        'pro_id',
        'fac_numero_facturas',
        'fac_fecha',
        'fac_iva',
        'fac_descuento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fac_id' => 'integer',
        'tie_id' => 'integer',
        'per_id' => 'integer',
        'pro_id' => 'integer',
        'fac_numero_facturas' => 'integer',
        'fac_fecha' => 'date',
        'fac_iva' => 'numeric',
        'fac_descuento' => 'numeric'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tie_id' => 'required|integer',
        'per_id' => 'required|integer',
        'pro_id' => 'required|integer',
        'fac_numero_facturas' => 'numeric|max:20',
        'fac_fecha' => 'date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function per()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'per_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pro()
    {
        return $this->belongsTo(\App\Models\Producto::class, 'pro_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tie()
    {
        return $this->belongsTo(\App\Models\Tienda::class, 'tie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function facturaDetalles()
    {
        return $this->hasMany(\App\Models\FacturaDetalle::class, 'fac_id');
    }
}
