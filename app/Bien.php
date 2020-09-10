<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    //
    protected $table='bien';
    protected $primaryKey='CodBien';

    public $timestamps=false;

    protected $fillable =[
	'CodBien' ,
    'Nombre',
    'FechaAdquisicion',
    'ValorCompra' ,
    'Estado' ,
    'EstadoBien',
    'UbicacionDepartamento',
    'UbicacionAlmacen' ,
    'CodCategoria',
    'CodRubro',
    'NuevoValorRevaluo'
    ];

    protected $guarded =[

    ];
}
