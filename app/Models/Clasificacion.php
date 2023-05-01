<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
  public $timestamps = false;
    use HasFactory;
    //relacion con tabla Nota
    public function nota() { 
        return $this->belongsTo(Nota::class); 
      } 
    //que se debe llenar
    protected $fillable = [
      'nombre'     
  ];
}
