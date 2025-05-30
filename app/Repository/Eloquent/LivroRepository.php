<?php

namespace App\Repository\Eloquent;

use App\Models\Livro;
use App\Repository\Eloquent\AbstractRepository;

class LivroRepository extends AbstractRepository
{
    protected function model()
    {
        return Livro::class;
    }

    public function livrosPorAutor($autorId)
    {
        return $this->model->whereHas('autores', function ($query) use ($autorId) {
            $query->where('autor_id', $autorId);
        })
            ->get();
    }

    public function livrosComRelacionamentos()
    {
        return $this->model->with(['autores', 'assuntos'])->get();
    }

    public function relatorioAgrupadoPorAutor()
    {
        return $this->model
            ->with(['autores', 'assuntos'])
            ->get()
            ->groupBy(function ($livro) {
                return $livro->autores->pluck('nome')->join(', ');
            });
    }

    public function allWithRelations()
    {
        return Livro::with(['autores', 'assuntos'])->get();
    }
}
