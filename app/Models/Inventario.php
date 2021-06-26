<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inventario
 * @package App\Models
 * @version June 8, 2021, 9:11 pm UTC
 *
 * @property \App\Models\Persona $per
 * @property \App\Models\Producto $pro
 * @property \App\Models\Tienda $tie
 * @property integer $pro_id
 * @property integer $tie_id
 * @property integer $per_id
 * @property string $inv_fecha
 * @property time $inv_hora
 * @property integer $inv_cantidad
 * @property integer $inv_documento
 * @property integer $inv_serie
 */
class Inventario extends Model
{

    public $table = 'inventario';
    protected $primaryKey='inv_id';
    public $timestamps=false;
    

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'inv_id' => 'integer',
        'pro_id' => 'integer',
        'tie_id' => 'integer',
        'per_id' => 'integer',
        'inv_fecha' => 'date',
        'inv_cantidad' => 'integer',
        'inv_documento' => 'integer',
        'inv_serie' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pro_id' => 'required|integer',
        'tie_id' => 'required|integer',
        'per_id' => 'nullable|integer',
        'inv_fecha' => 'required',
        'inv_hora' => 'required',
        'inv_cantidad' => 'required|integer',
        'inv_documento' => 'required|integer',
        'inv_serie' => 'required|integer'
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
}
