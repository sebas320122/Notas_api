<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    public $timestamps = false;
    use HasFactory;
    //relacion entre tabla Clasificacion
    public function clasificacion() { 
        return $this->hasOne(clasificacion::class); 
      } 

      //que se debe llenar
      protected $fillable = [
        'titulo',
         'autor', 
         'horaFecha', 
         'descripcion',
         'id_clasificacion'
    ];
}
