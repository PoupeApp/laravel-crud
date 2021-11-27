<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    use HasFactory;

    public function livro() {
        return $this->belongsTo('App\Models\Livro', 'livro_id', 'id');
    }

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }
}
