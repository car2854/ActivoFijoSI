<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Custodio extends Model
{
    protected $table = 'custodio';
    protected $primaryKey = 'CodCustodio';
    public $timestamps = false;

    protected $fillable = [
    	'CodCustodio',
        'Nombre',
    	'Apellido',
        'Telefono',
        'Estado',
        'CodDepartamento'
    ];

    protected $guarded = [

    ];
}
