<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoProducto
 * @package App\Models
 * @version June 8, 2021, 8:25 pm UTC
 *
 * @property \App\Models\Distribuidor $dis
 * @property \Illuminate\Database\Eloquent\Collection $productos
 * @property integer $dis_id
 * @property string $tpro_descripcion
 * @property string $tpro_estado
 */
class TipoProducto extends Model
{

    public $table = 'tipo_producto';
    protected $primaryKey='tpro_id';
    public $timestamps=false;
    



    public $fillable = [
        'dis_id',
        'tpro_descripcion',
        'tpro_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tpro_id' => 'integer',
        'dis_id' => 'integer',
        'tpro_descripcion' => 'string',
        'tpro_estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dis_id' => 'required|integer',
        'tpro_descripcion' => 'required|string|max:150', //nullable
        'tpro_estado' => 'required|string|max:150'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dis()
    {
        return $this->belongsTo(\App\Models\Distribuidor::class, 'dis_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productos()
    {
        return $this->hasMany(\App\Models\Producto::class, 'tpro_id');
    }
}
