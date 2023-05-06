<?php

namespace App\Repositories\Cadastros;
use App\Http\Resources\Api\Cadastros\EmpresaResource;
use App\Models\Api\Cadastros\Empresa;
use App\Repositories\Cadastros\Interfaces\EmpresaRepositoryInterface;

class EmpresaRepository implements EmpresaRepositoryInterface
{
    public function __construct(
        protected Empresa $model
    ) {
    }

    public function getAll()
    {
        $result = $this->model->all();
        return EmpresaResource::collection($result);
    }

    public function findOne(string $id)
    {
        $empresa = $this->model->find($id);        
        
        if (!$empresa) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }
        return new EmpresaResource($empresa);        
    }

    public function delete(string $id)
    {
        $empresa = $this->model->find($id);
        
        if ($empresa) {
            $empresa->delete();
            return response()->json(['Sucesso' => 'Registro Excluido com Sucesso.'], 200);
        }
        return response()->json(['error' => 'Registro não Encontrado.'], 401);
    }

    public function new($empresaRequest)
    {
        $empresa = $this->model->create(
            $empresaRequest
        );
        if (!$empresa) {
            return response()->json(['error' => 'Empresa não Cadastrada.'], 401);
        }

        return new EmpresaResource($empresa);
    }

    public function update($empresaRequest, string $id)
    {
        if (!$empresa = $this->model->find($id)) {
            return response()->json(['error' => 'Registro não Encontrado.'], 401);
        }

        $empresa->update(
            (array) $empresaRequest
        );

        return new EmpresaResource($empresa);
    }
}
