<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resenia extends Model
{
    use HasFactory;
    protected $primaryKey = 'reseniaID';
    protected $fillable = [
        'libroID',
        'usuarioID',
        'descripcion',
        'fecha'
    ];


    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libroID');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarioID');
    }
}
