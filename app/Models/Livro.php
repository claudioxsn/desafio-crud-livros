<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{

    use SoftDeletes;

  protected $fillable = [
        'titulo',
        'editora',
        'edicao',
        'ano_publicacao',
        'valor',
    ];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto');
    }
}
