<?php

namespace App\Repositories\Cadastros\Interfaces;

interface CulturaRepositoryInterface{
    public function getAll();
    public function findOne(string $id);
    public function delete(string $id);
    public function new($empresaRequest);
    public function update($empresaRequest, string $id);
}
