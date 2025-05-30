<?php

namespace App\Services;

use App\Repository\Eloquent\LivroRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LivroService
{
    protected $livroRepository;

    public function __construct(LivroRepository $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function listarTodos()
    {
        return $this->livroRepository->all();
    }

    public function buscarPorId($id)
    {
        return $this->livroRepository->find($id);
    }

    public function criar(array $dados)
    {
        return DB::transaction(function () use ($dados) {

            $livro = $this->livroRepository->create($dados);

            if (isset($dados['autor_id'])) {
                $livro->autores()->sync($dados['autor_id']);
            }

            if (isset($dados['assunto_id'])) {
                $livro->assuntos()->sync($dados['assunto_id']);
            }

            return $livro;
        });
    }

    public function atualizar($id, array $dados)
    {
        return DB::transaction(function () use ($id, $dados) {
            $livro = $this->livroRepository->update($id, $dados);

            if (isset($dados['autor_id'])) {
                $livro->autores()->sync($dados['autor_id']);
            }

            if (isset($dados['assunto_id'])) {
                $livro->assuntos()->sync($dados['assunto_id']);
            }

            return $livro;
        });
    }

    public function deletar($id)
    {
        return $this->livroRepository->delete($id);
    }

    public function listarComRelacionamentos()
    {
        return $this->livroRepository->livrosComRelacionamentos();
    }

    public function relatorioAgrupadoPorAutor()
    {
        return $this->livroRepository->relatorioAgrupadoPorAutor();
    }
}
