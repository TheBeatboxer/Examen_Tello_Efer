<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'usuarioID';

    protected $fillable = [
        'nombre',
        'edad',
        'email'
    ];

    public function resenia()
    {
        return $this->hasOne(Resenia::class, 'usuarioID');
    }

    public function librorReserva()
    {
        return $this->hasMany(LibroReserva::class, 'usuarioID');
    }
}
