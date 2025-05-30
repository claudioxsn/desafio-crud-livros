<?php

namespace App\Repository\Eloquent;

use App\Models\Autor;
use App\Repository\Eloquent\AbstractRepository;

class AutorRepository extends AbstractRepository
{
    protected function model()
    {
        return Autor::class;
    }

    public function buscarPorId($id)
    {
        return Autor::find($id);
    }

    public function criar(array $dados)
    {
        return Autor::create($dados);
    }

      public function atualizar($id, array $dados)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($dados);
        return $autor;
    }

    public function deletar($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
    }
}
