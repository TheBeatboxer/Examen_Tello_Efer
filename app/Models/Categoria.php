<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoriaID';
    protected $fillable = [
        'tipo'
    ];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'categoriaID');
    }
}
