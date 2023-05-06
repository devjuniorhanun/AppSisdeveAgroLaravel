<?php

namespace App\Services\Cadastros;

use App\Repositories\Cadastros\Interfaces\CulturaRepositoryInterface;

class CulturaService
{
    public function __construct(
        protected CulturaRepositoryInterface $repository,
    ) {}

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findOne(string $id)
    {
        return $this->repository->findOne($id);
    }

    public function new($empresaRequest)
    {
        return $this->repository->new($empresaRequest);
    }

    public function update($empresaRequest, string $id)
    {
        return $this->repository->update($empresaRequest, $id);
    }

    public function delete(string $id)
    {
        return $this->repository->delete($id);
    }
}
