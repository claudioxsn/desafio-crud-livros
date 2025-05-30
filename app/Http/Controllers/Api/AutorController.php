<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AutorService;
use Illuminate\Http\Request;

class AutorController extends Controller
{


    protected $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->autorService->listarTodos());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = $this->autorService->criar($request->all());

        return response()->json($autor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = $this->autorService->buscarPorId($id);

        if (!$autor) {
            return response()->json(['erro' => 'autor não encontrado'], 404);
        }

        return response()->json($autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = $this->autorService->atualizar($id, $request->all());

        return response()->json($autor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->autorService->deletar($id);
        return response()->json(['mensagem' => 'autor deletado com sucesso']);
    }
}
