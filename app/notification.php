<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
  protected $table='notification';

  protected $primaryKey='IdNotification';

  public $timestamps = false;

  protected $fillable = [
    'Visto',
    'IdBitacora',
    'IdUsuario',
  ];
}
