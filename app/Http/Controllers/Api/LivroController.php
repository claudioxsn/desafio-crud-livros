<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LivroService;
use Illuminate\Http\Request;

class LivroController extends Controller
{

    protected $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->livroService->listarTodos());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $livro = $this->livroService->criar($request->all());

        return response()->json($livro, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = $this->livroService->buscarPorId($id);

        if (!$livro) {
            return response()->json(['erro' => 'livro não encontrado'], 404);
        }

        return response()->json($livro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $livro = $this->livroService->atualizar($id, $request->all());

        return response()->json($livro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->livroService->deletar($id);
        return response()->json(['mensagem' => 'livro deletado com sucesso']);
    }
}
