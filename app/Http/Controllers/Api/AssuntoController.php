<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssuntoRequest;
use App\Services\AssuntoService;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{

    protected $assuntoService;

    public function __construct(AssuntoService $assuntoService)
    {
        $this->assuntoService = $assuntoService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->assuntoService->listarTodos());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssuntoRequest $request)
    {
        $assunto = $this->assuntoService->criar($request->all());

        return response()->json($assunto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assunto = $this->assuntoService->buscarPorId($id);

        if (!$assunto) {
            return response()->json(['erro' => 'assunto não encontrado'], 404);
        }

        return response()->json($assunto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssuntoRequest $request, string $id)
    {

        $assunto = $this->assuntoService->atualizar($id, $request->all());

        return response()->json($assunto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->assuntoService->deletar($id);
        return response()->json(['mensagem' => 'assunto deletado com sucesso']);
    }

    public function restore($id)
    {
        $this->assuntoService->restore($id);
        return response()->json(['mensagem' => 'assunto restaurado com sucesso']);
    }
}
