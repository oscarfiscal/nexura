<?php

namespace App\Models;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;

    protected $guarded=[]; //para que no se puedan crear campos que no existan en la base de datos

    public function employes(){
        return $this->belongsToMany(Employe::class);
    }
}
