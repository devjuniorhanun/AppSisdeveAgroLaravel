<?php

namespace App\Repositories\Cadastros;

use App\Http\Resources\Api\Cadastros\VariedadeCulturaResource;
use App\Models\Api\Cadastros\VariedadeCultura;
use App\Repositories\Cadastros\Interfaces\VariedadeCulturaRepositoryInterface;

class VariedadeCulturaRepository implements VariedadeCulturaRepositoryInterface
{
    public function __construct(
        protected VariedadeCultura $model
    ) {
    }

    public function getAll()
    {
        $cultura  = $this->model->all();
        if ($cultura) {
            return VariedadeCulturaResource::collection($cultura);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function findOne(string $id)
    {
        $cultura = $this->model->find($id);

        if (!$cultura) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }
        return new VariedadeCulturaResource($cultura);
    }

    public function delete(string $id)
    {
        $cultura = $this->model->find($id);

        if ($cultura) {
            $cultura->delete();
            return response()->json(['Sucesso' => 'Registro Excluido com Sucesso.'], 200);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function new($culturaRequest)
    {
        $cultura = $this->model->create(
            $culturaRequest
        );
        if (!$cultura) {
            return response()->json(['error' => 'cultura não Cadastrada.'], 401);
        }

        return new VariedadeCulturaResource($cultura);
    }

    public function update($culturaRequest, string $id)
    {
        if (!$cultura = $this->model->find($id)) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }

        $cultura->update(
            (array) $culturaRequest
        );

        return new VariedadeCulturaResource($cultura);
    }
}
