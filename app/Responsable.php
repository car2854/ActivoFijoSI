<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    //
    protected $table = 'responsable';
    protected $primaryKey = 'CodResponsable';
    public $timestamps = false;

    protected $fillable = [
    	'CodResponsable',
        'Nombre',
    	'Apellido',
        'Telefono',
        'Estado'
    ];

    protected $guarded = [

    ];
}
