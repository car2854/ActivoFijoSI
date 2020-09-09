<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table='almacen';

    protected $primaryKey="NroAlmacen";

    public $timestamps=false;

    protected $fillable = [
      'NroAlmacen',
      'Direccion',
      'Estado'
    ];

    protected $guarded = [

    ];
}
