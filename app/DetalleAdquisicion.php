<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class DetalleAdquisicion extends Model
{
    protected $table='detalleadquisicion';
    protected $primaryKey='NroDetalleAdquisicion';

    public $timestamps=false;

    protected $fillable =[
        'Cantidad',
        'Precio',
        'NroAdquisicion',
        'CodCategoria',
    ];

    protected $guarded =[
        
    ];
}
