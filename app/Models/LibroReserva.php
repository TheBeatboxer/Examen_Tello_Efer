<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroReserva extends Model
{
    use HasFactory;
    protected $primaryKey = 'libroReservasID';
    protected $fillable = [
        'usuarioID',
        'libroID'
    ];


    public function libro()
    {
        return $this->belongsToMany(Libro::class, 'libroID');
    }

    public function usuario()
    {
        return $this->belongsToMany(Usuario::class, 'usuarioID');
    }

}
