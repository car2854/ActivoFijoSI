<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
    protected $table='baja';

    protected $primaryKey='NroBaja';

    public $timestamps = false;

    protected $fillable = [
    'NroBaja',
    'FechaHora',
    'Descripcion',
    'NroRevision'
    ];

    protected $guarded = [

    ];
}
