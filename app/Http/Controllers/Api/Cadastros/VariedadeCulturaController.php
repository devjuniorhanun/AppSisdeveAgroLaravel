<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\VariedadeCulturaRequest;
use App\Services\Cadastros\VariedadeCulturaService;

class VariedadeCulturaController extends Controller
{
    public function __construct(
        protected VariedadeCulturaService $service
    ) {
    }

    public function index()
    {
        $variedades = $this->service->getAll();
        
        return $variedades;
    }

    public function store(VariedadeCulturaRequest $request)
    {
        $variedade = $this->service->new($request->validated());

        return $variedade;
    }

    public function show(string $id)
    {
        if ($variedade = $this->service->findOne($id)) {
            return $variedade;
        }
        
    }

    public function update(VariedadeCulturaRequest $request, string $id)
    {
        $variedade = $this->service->update($request->validated(), $id);

        return $variedade;
    }

    public function destroy(string $id)
    {
       return $this->service->delete($id);
    }
}
