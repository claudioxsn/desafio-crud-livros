<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assunto extends Model
{

    use SoftDeletes;

    protected $table = 'Assunto';
    protected $primaryKey = 'codAs';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'Descricao',
    ];

    public function livros()
    {
        return $this->belongsToMany(
            Livro::class,
            'livro_assunto',
            'Assunto_codAs',
            'Livro_Codl'
        );
    }
}
