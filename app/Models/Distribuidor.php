<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Distribuidor
 * @package App\Models
 * @version June 8, 2021, 6:21 pm UTC
 *
 * @property \App\Models\Tienda $tie
 * @property integer $tie_id
 * @property string $dis_nombre
 * @property string $dis_direccion
 * @property string $dis_correo
 * @property integer $dis_telefono
 */
class Distribuidor extends Model
{
    

    public $table = 'distribuidor';
    protected $primaryKey='dis_id';
    public $timestamps=false;
    

    public $fillable = [
        'tie_id',
        'dis_nombre',
        'dis_direccion',
        'dis_correo',
        'dis_telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dis_id' => 'integer',
        'tie_id' => 'integer',
        'dis_nombre' => 'string',
        'dis_direccion' => 'string',
        'dis_correo' => 'string',
        'dis_telefono' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tie_id' => 'required|integer',
        'dis_nombre' => 'required|string|max:150',
        'dis_direccion' => 'required|string|max:150',
        'dis_correo' => 'required|string|max:150',
        'dis_telefono' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tie()
    {
        return $this->belongsTo(\App\Models\Tienda::class, 'tie_id');
    }
}
