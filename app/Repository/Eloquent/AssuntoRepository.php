<?php

namespace App\Repository\Eloquent;

use App\Models\Assunto;
use App\Repository\Eloquent\AbstractRepository;

class AssuntoRepository extends AbstractRepository
{
    protected function model()
    {
        return Assunto::class;
    }

    public function buscarPorId($id)
    {
        return Assunto::find($id);
    }

    public function criar(array $dados)
    {
        return Assunto::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $assunto = Assunto::findOrFail($id);
        $assunto->update($dados);
        return $assunto;
    }

    public function deletar($id)
    {
        $assunto = Assunto::findOrFail($id);
        $assunto->delete();
    }
}
