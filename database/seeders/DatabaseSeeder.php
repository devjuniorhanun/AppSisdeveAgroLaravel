<?php

namespace Database\Seeders;

use App\Models\Api\Cadastros\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // 123456789
            'remember_token' => Str::random(10),
        ]);

       /* Empresa::create([
            'id' => '98ca28eb-96e2-4a49-b98c-fffac5a2315e',
            'nome' => 'nome',
            'cnpj' => 'cnpj',
            'url' => null,
            'email' => 'email@email.com',
            'telefone' => 'telefone',
            'logo' => 'logo',
            'latitude' => 'latitude',
            'longitute' => 'longitute',
            'face_link' => null,
            'instagran_link' => null,
            'twitter_link' => null,
            'status' => true
        ]);
        */
    }
}
