<?php

namespace App\Models;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $guarded=[]; //para que no se puedan crear campos que no existan en la base de datos

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function roles(){
        return $this->belongsToMany(Rol::class);
   }

}
