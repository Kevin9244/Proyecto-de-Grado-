<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FacturaDetalle
 * @package App\Models
 * @version June 8, 2021, 10:45 pm UTC
 *
 * @property \App\Models\Factura $fac
 * @property integer $fac_id
 * @property string $facd_detalle_producto
 * @property string $facd_valor_producto
 * @property string $facd_descuento
 * @property string $facd_valor_total
 */
class FacturaDetalle extends Model
{
 

    public $table = 'factura_detalle';
    protected $primaryKey='facd_id';
    public $timestamps=false;


    public $fillable = [
        'fac_id',
        'pro_id',
        'facd_cant',
        'facd_vu',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'facd_id' => 'integer',
        'fac_id' => 'integer',
        'pro_id'=>'integer',
        'facd_cant'=>'numeric',
        'facd_vu'=>'numeric'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fac_id' => 'integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fac()
    {
        return $this->belongsTo(\App\Models\Factura::class, 'fac_id');
    }
}
