<?php

namespace App\Providers;

use App\Repositories\Cadastros\{
    AnoAgriculaRepository,
    CulturaRepository,
    EmpresaRepository,
    SafraRepository,
    VariedadeCulturaRepository
};
use App\Repositories\Cadastros\Interfaces\{
    EmpresaRepositoryInterface,
    AnoAgriculaRepositoryInterface,
    CulturaRepositoryInterface,
    SafraRepositoryInterface,
    VariedadeCulturaRepositoryInterface
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(EmpresaRepositoryInterface::class, EmpresaRepository::class);
        $this->app->bind(AnoAgriculaRepositoryInterface::class, AnoAgriculaRepository::class);
        $this->app->bind(SafraRepositoryInterface::class, SafraRepository::class);
        $this->app->bind(CulturaRepositoryInterface::class, CulturaRepository::class);
        $this->app->bind(VariedadeCulturaRepositoryInterface::class, VariedadeCulturaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
