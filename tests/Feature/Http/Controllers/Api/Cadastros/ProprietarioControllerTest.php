<?php

namespace Tests\Feature\Http\Controllers\Api\Cadastros;

use App\Models\Empresa;
use App\Models\Proprietario;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\Cadastros\ProprietarioController
 */
class ProprietarioControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $proprietarios = Proprietario::factory()->count(3)->create();

        $response = $this->get(route('proprietario.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\ProprietarioController::class,
            'store',
            \App\Http\Requests\Api\Cadastros\ProprietarioStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $empresa = Empresa::factory()->create();
        $razao_social = $this->faker->word;
        $nome_fantasia = $this->faker->word;
        $abreviacao = $this->faker->word;
        $tipo_pagamento = $this->faker->word;
        $tipo = $this->faker->word;
        $data_nascimento = $this->faker->date();
        $estado_civel = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->post(route('proprietario.store'), [
            'empresa_id' => $empresa->id,
            'razao_social' => $razao_social,
            'nome_fantasia' => $nome_fantasia,
            'abreviacao' => $abreviacao,
            'tipo_pagamento' => $tipo_pagamento,
            'tipo' => $tipo,
            'data_nascimento' => $data_nascimento,
            'estado_civel' => $estado_civel,
            'status' => $status,
        ]);

        $proprietarios = Proprietario::query()
            ->where('empresa_id', $empresa->id)
            ->where('razao_social', $razao_social)
            ->where('nome_fantasia', $nome_fantasia)
            ->where('abreviacao', $abreviacao)
            ->where('tipo_pagamento', $tipo_pagamento)
            ->where('tipo', $tipo)
            ->where('data_nascimento', $data_nascimento)
            ->where('estado_civel', $estado_civel)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $proprietarios);
        $proprietario = $proprietarios->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $proprietario = Proprietario::factory()->create();

        $response = $this->get(route('proprietario.show', $proprietario));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\ProprietarioController::class,
            'update',
            \App\Http\Requests\Api\Cadastros\ProprietarioUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $proprietario = Proprietario::factory()->create();
        $empresa = Empresa::factory()->create();
        $razao_social = $this->faker->word;
        $nome_fantasia = $this->faker->word;
        $abreviacao = $this->faker->word;
        $tipo_pagamento = $this->faker->word;
        $tipo = $this->faker->word;
        $data_nascimento = $this->faker->date();
        $estado_civel = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('proprietario.update', $proprietario), [
            'empresa_id' => $empresa->id,
            'razao_social' => $razao_social,
            'nome_fantasia' => $nome_fantasia,
            'abreviacao' => $abreviacao,
            'tipo_pagamento' => $tipo_pagamento,
            'tipo' => $tipo,
            'data_nascimento' => $data_nascimento,
            'estado_civel' => $estado_civel,
            'status' => $status,
        ]);

        $proprietario->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($empresa->id, $proprietario->empresa_id);
        $this->assertEquals($razao_social, $proprietario->razao_social);
        $this->assertEquals($nome_fantasia, $proprietario->nome_fantasia);
        $this->assertEquals($abreviacao, $proprietario->abreviacao);
        $this->assertEquals($tipo_pagamento, $proprietario->tipo_pagamento);
        $this->assertEquals($tipo, $proprietario->tipo);
        $this->assertEquals(Carbon::parse($data_nascimento), $proprietario->data_nascimento);
        $this->assertEquals($estado_civel, $proprietario->estado_civel);
        $this->assertEquals($status, $proprietario->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $proprietario = Proprietario::factory()->create();

        $response = $this->delete(route('proprietario.destroy', $proprietario));

        $response->assertNoContent();

        $this->assertModelMissing($proprietario);
    }
}
