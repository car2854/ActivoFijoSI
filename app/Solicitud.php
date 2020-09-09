<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table='solicitud';
    protected $primaryKey='NroSolicitud';

    public $timestamps=false;

    protected $fillable =[
        'FechaHora',
        'CodResponsable',
        'CodCustodio',
    ];

    protected $guarded =[
        
    ];
}
