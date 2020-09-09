<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Revaluo extends Model
{
  protected $table='revaluo';

  protected $primaryKey='NroRevaluo';

  public $timestamps = false;

  protected $fillable = [
    'NroRevision',
    'Estado',
    'FechaHora',
    'Monto',
    'Descripcion',
  ];

  protected $guarded = [

  ];
}
