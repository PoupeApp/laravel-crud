<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'isbn',
        'sinopse',
        'dataPublicacao',
        "editora_id"
    ];
    public function autores() {
        return $this->belongsToMany('App\Models\Autor');
    }
    public function generos() {
        return $this->belongsToMany('App\Models\Genero');
    }
    public function editora() {
        return $this->belongsTo('App\Models\Editora', 'editora_id', 'id');
    }
}
