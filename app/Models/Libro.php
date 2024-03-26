<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $primaryKey = 'libroID';

    protected $fillable = [
        'categoriaID',
        'titulo',
        'precio',
        'fechaPublicacion'
    ];

    public function libroReserva()
    {
        return $this->hasMany(LibroReserva::class, 'libroReservasID');
    }

    public function libroAutores()
    {
        return $this->hasMany(LibroAutor::class, 'libroAutorID');
    }

    public function resenia()
    {
        return $this->hasOne(Resenia::class, 'libroID');
    }

    public function categoria()
    {
        return $this->hasMany(Categoria::class, 'categoriID');
    }



}
