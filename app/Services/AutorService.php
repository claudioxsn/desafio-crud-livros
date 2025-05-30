<?php

namespace App\Services;

use App\Repository\Eloquent\AutorRepository;
use Illuminate\Support\Facades\DB;

class AutorService
{
    protected $autorRepository;

    public function __construct(AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function listarTodos()
    {
        return $this->autorRepository->all();
    }

    public function buscarPorId($id)
    {
        return $this->autorRepository->find($id);
    }

    public function criar(array $dados)
    {
        return DB::transaction(function () use ($dados) {
            $autor = $this->autorRepository->create($dados);

            return $autor;
        });
    }

    public function atualizar($id, array $dados)
    {
        return DB::transaction(function () use ($id, $dados) {
            $autor = $this->autorRepository->update($id, $dados);

            return $autor;
        });
    }

    public function deletar($id)
    {
        return $this->autorRepository->delete($id);
    }
}
