<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Tranferencia extends Model
{
    protected $table='tranferencia';
    protected $primaryKey='NroTranferencia';

    public $timestamps=false;

    protected $fillable =[
        'NroTranferencia',
        'FechaTransferencia',
        'CodCustodioOrigen',
        'CodCustodioDestino',
        'CodResponsable',
        'CodBien',
        'EstadoBien',
    ];

    protected $guarded =[

    ];
}
