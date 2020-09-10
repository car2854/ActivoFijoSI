<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Log_Change extends Model
{
  protected $table='log_change';

  protected $primaryKey='id';

  public $timestamps = false;

  protected $fillable = [
    'id',
  	'id_user',
  	'accion',
  	'fechaAccion',

  ];

  protected $guarded = [

  ];
}
