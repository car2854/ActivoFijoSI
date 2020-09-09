<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Depreciacion extends Model
{
    protected $table='depreciacion';
    protected $primaryKey='NroDepreciacion';

    public $timestamps=false;

    protected $fillable =[
        'DepreciacionAcumulada',
        'Descripcion',
        'Fecha',
        'CodBien',
    ];

    protected $guarded =[
        
    ];
}
