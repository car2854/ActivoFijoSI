<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Adquisicion extends Model
{
    protected $table = "adquisicion";
    protected $primarykey = "NroAdquisicion";
    public $timestamps = false;

    protected $fillable = [
        'Fecha',
        'Cantidad',
        'CodProveedor',
        'NroAlmacen'
    ];
}
