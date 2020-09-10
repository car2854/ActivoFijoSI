<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table='mantenimiento';

    protected $primaryKey='NroMantenimiento';

    public $timestamps = false;

    protected $fillable = [
        'NroMantenimiento',
        'Problema',
        'Solucion',
        'FechaInicio',
        'FechaFinalizo',
        'HoraIncio',
        'HoraFinalizo',
        'Duraccion',
        'Costo',
        'NroRevision',
    ];

    protected $guarded = [

    ];
}
