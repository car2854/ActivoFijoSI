<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
  protected $table='revisiontecnica';

  protected $primaryKey="NroRevision";

  public $timestamps=false;

  protected $fillable = [
    'FechaHora',
    'CodCustodio',
    'CodBien',
    'CodOperador'
  ];

  protected $guarded = [

  ];
}
