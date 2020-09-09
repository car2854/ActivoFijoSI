<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $table = 'operador';
    protected $primaryKey = 'CodOperador';
    public $timestamps = false;

    protected $fillable = [
    	'CodOperador',
        'Nombre',
    	'Apellido',
    	'Telefono',
        'Gmail',
        'Estado'
    ];

    protected $guarded = [

    ];
}
