<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assunto extends Model
{

    use SoftDeletes; 

    protected $fillable = ['descricao'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto');
    }
}
