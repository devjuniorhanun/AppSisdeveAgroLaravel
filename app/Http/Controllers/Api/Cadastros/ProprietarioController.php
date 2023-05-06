<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\ProprietarioRequest;
use App\Services\Cadastros\ProprietarioService;

class ProprietarioController extends Controller
{
    public function __construct(
        protected ProprietarioService $service,
    ) {
    }

    public function index()
    {
        $results = $this->service->getAll();
        
        return $results;
    }

    public function store(ProprietarioRequest $request)
    {
        $result = $this->service->new($request->validated());

        return $result;
    }

    public function show(string $id)
    {
        if ($result = $this->service->findOne($id)) {
            return $result;
        }
        
    }

    public function update(ProprietarioRequest $request, string $id)
    {
        $result = $this->service->update($request->validated(), $id);

        return $result;
    }

    public function destroy(string $id)
    {
       return $this->service->delete($id);
    }
}
