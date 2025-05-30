<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use SoftDeletes;

    protected $table = 'Autor';
    protected $primaryKey = 'CodAu';
    public $incrementing = true;    // Indica que a PK não é auto-incremental
    protected $keyType = 'integer';  // Define o tipo da PK se não for o padrão

    protected $fillable = [
        'Nome'
    ];

    public function livros()
    {
        return $this->belongsToMany(
            Livro::class,
            'livro_autor',      // Nome da tabela pivot
            'Autor_CodAu',      // Chave estrangeira deste model na tabela pivot
            'Livro_Codl'        // Chave estrangeira do model relacionado na tabela pivot
        );
    }
}
