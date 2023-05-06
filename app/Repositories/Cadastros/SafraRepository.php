<?php

namespace App\Repositories\Cadastros;

use App\Http\Resources\Api\Cadastros\SafraResource;
use App\Models\Api\Cadastros\Safra;
use App\Repositories\Cadastros\Interfaces\SafraRepositoryInterface;

class SafraRepository implements SafraRepositoryInterface
{
    public function __construct(
        protected Safra $model
    ) {
    }

    public function getAll()
    {
        $safra  = $this->model->all();
        if ($safra) {
            return SafraResource::collection($safra);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function findOne(string $id)
    {
        $safra = $this->model->find($id);

        if (!$safra) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }
        return new SafraResource($safra);
    }

    public function delete(string $id)
    {
        $safra = $this->model->find($id);

        if ($safra) {
            $safra->delete();
            return response()->json(['Sucesso' => 'Registro Excluido com Sucesso.'], 200);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function new($safraRequest)
    {
        $safra = $this->model->create(
            $safraRequest
        );
        if (!$safra) {
            return response()->json(['error' => 'safra não Cadastrada.'], 401);
        }

        return new SafraResource($safra);
    }

    public function update($safraRequest, string $id)
    {
        if (!$safra = $this->model->find($id)) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }

        $safra->update(
            (array) $safraRequest
        );

        return new SafraResource($safra);
    }
}
