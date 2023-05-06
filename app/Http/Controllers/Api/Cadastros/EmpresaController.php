<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\EmpresaRequest;
use App\Services\Cadastros\EmpresaService;

class EmpresaController extends Controller
{
    public function __construct(
        protected EmpresaService $service
    ) {
    }

    public function index()
    {
        $empresas = $this->service->getAll();
        
        return $empresas;
    }

    public function store(EmpresaRequest $request)
    {
        $empresa = $this->service->new($request->validated());

        return $empresa;
    }

    public function show(string $id)
    {
        if ($empresa = $this->service->findOne($id)) {
            return $empresa;
        }
        
    }

    public function update(EmpresaRequest $request, string $id)
    {
        $empresa = $this->service->update($request->validated(), $id);

        return $empresa;
    }

    public function destroy(string $id)
    {
       return $this->service->delete($id);
    }
}
