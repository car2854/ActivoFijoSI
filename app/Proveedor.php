<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedor";
    protected $primary_keys = "CodProveedor";
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Apellido',
        'Telefono',
        'Direccion',
        'Estado'
    ];

    protected $guarded =[
        
    ];
}
