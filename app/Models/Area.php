<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $guarded=[]; //para que no se puedan crear campos que no existan en la base de datos

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
