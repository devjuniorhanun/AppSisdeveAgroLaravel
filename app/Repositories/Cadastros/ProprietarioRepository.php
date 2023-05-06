<?php

namespace App\Repositories\Cadastros;

use App\Http\Resources\Api\Cadastros\ProprietarioResource;
use App\Models\Api\Cadastros\Proprietario;
use App\Models\Api\Cadastros\Safra;
use App\Repositories\Cadastros\Interfaces\ProprietarioRepositoryInterface;

class ProprietarioRepository implements ProprietarioRepositoryInterface
{
    public function __construct(
        protected Proprietario $model,
        protected ProprietarioResource $resource
    ) {
    }

    public function getAll()
    {
        $proprietario  = $this->model->all();
        if ($proprietario) {
            return $this->resource->collection($proprietario);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function findOne(string $id)
    {
        $proprietario = $this->model->find($id);

        if (!$proprietario) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }
        return new $this->resource($proprietario);
    }

    public function delete(string $id)
    {
        $proprietario = $this->model->find($id);

        if ($proprietario) {
            $proprietario->delete();
            return response()->json(['Sucesso' => 'Registro Excluido com Sucesso.'], 200);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function new($proprietarioRequest)
    {
        $proprietario = $this->model->create(
            $proprietarioRequest
        );
        if (!$proprietario) {
            return response()->json(['error' => 'proprietario não Cadastrada.'], 401);
        }

        return new $this->resource($proprietario);
    }

    public function update($proprietarioRequest, string $id)
    {
        if (!$proprietario = $this->model->find($id)) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }

        $proprietario->update(
            (array) $proprietarioRequest
        );

        return new $this->resource($proprietario);
    }
}
