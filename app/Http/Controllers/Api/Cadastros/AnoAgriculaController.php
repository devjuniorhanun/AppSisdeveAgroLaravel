<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\AnoAgriculaRequest;
use App\Services\Cadastros\AnoAgriculaService;


class AnoAgriculaController extends Controller
{
    public function __construct(
        protected AnoAgriculaService $service
    ) {
    }

    public function index()
    {
        $empresas = $this->service->getAll();
        
        return $empresas;
    }

    public function store(AnoAgriculaRequest $request)
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

    public function update(AnoAgriculaRequest $request, string $id)
    {
        $empresa = $this->service->update($request->validated(), $id);

        return $empresa;
    }

    public function destroy(string $id)
    {
       return $this->service->delete($id);
    }
}
