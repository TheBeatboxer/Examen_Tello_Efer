<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroAutor extends Model
{
    use HasFactory;
    protected $primaryKey = 'libroAutorID';

    protected $fillable = [
        'libroID',
        'autorID'
    ];

    public function libro()
    {
        return $this->belongsToMany(Libro::class, 'libroID');
    }

    public function autor()
    {
        return $this->belongsToMany(Autor::class, 'autorID');
    }
}
