<?php

namespace App\Services;

use App\Repository\Eloquent\AssuntoRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AssuntoService
{
    protected $assuntoRepository;

    public function __construct(AssuntoRepository $assuntoRepository)
    {
        $this->assuntoRepository = $assuntoRepository;
    }

    public function listarTodos()
    {
        return $this->assuntoRepository->all();
    }

    public function buscarPorId(int $id)
    {

        $assunto = $this->assuntoRepository->find($id);

        return $assunto;
    }

    public function criar(array $dados)
    {
        return DB::transaction(function () use ($dados) {
            $assunto = $this->assuntoRepository->create($dados);

            return $assunto;
        });
    }

    public function atualizar($id, array $dados)
    {
        return DB::transaction(function () use ($id, $dados) {
            $assunto = $this->assuntoRepository->update($id, $dados);

            return $assunto;
        });
    }

    public function deletar($id)
    {
        return $this->assuntoRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->assuntoRepository->restore($id);
    }
}
