<?php

namespace App\Repositories\Cadastros;

use App\Http\Resources\Api\Cadastros\AnoAgriculaResource;
use App\Models\Api\Cadastros\AnoAgricula;
use App\Repositories\Cadastros\Interfaces\AnoAgriculaRepositoryInterface;

class AnoAgriculaRepository implements AnoAgriculaRepositoryInterface
{
    public function __construct(
        protected AnoAgricula $model
    ) {
    }

    public function getAll()
    {
        $anoAgriculo  = $this->model->all();
        if ($anoAgriculo) {
            return AnoAgriculaResource::collection($anoAgriculo);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function findOne(string $id)
    {
        $anoAgriculo = $this->model->find($id);

        if (!$anoAgriculo) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }
        return new AnoAgriculaResource($anoAgriculo);
    }

    public function delete(string $id)
    {
        $anoAgriculo = $this->model->find($id);

        if ($anoAgriculo) {
            $anoAgriculo->delete();
            return response()->json(['Sucesso' => 'Registro Excluido com Sucesso.'], 200);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function new($anoAgriculoRequest)
    {
        $anoAgriculo = $this->model->create(
            $anoAgriculoRequest
        );
        if (!$anoAgriculo) {
            return response()->json(['error' => 'anoAgriculo não Cadastrada.'], 401);
        }

        return new AnoAgriculaResource($anoAgriculo);
    }

    public function update($anoAgriculoRequest, string $id)
    {
        if (!$anoAgriculo = $this->model->find($id)) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }

        $anoAgriculo->update(
            (array) $anoAgriculoRequest
        );

        return new AnoAgriculaResource($anoAgriculo);
    }
}
