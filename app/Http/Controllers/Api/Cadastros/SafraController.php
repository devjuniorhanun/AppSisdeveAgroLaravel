<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\SafraRequest;
use App\Services\Cadastros\SafraService;

class SafraController extends Controller
{
    public function __construct(
        protected SafraService $service
    ) {
    }

    public function index()
    {
        $empresas = $this->service->getAll();
        
        return $empresas;
    }

    public function store(SafraRequest $request)
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

    public function update(SafraRequest $request, string $id)
    {
        $empresa = $this->service->update($request->validated(), $id);

        return $empresa;
    }

    public function destroy(string $id)
    {
       return $this->service->delete($id);
    }
}
