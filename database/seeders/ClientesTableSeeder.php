<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Faker\Factory as Faker;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Criando 10 clientes fictícios
        for ($i = 0; $i < 10; $i++) {
            $tipo_pessoa = $faker->randomElement(['Física', 'Jurídica']);
            $cpf_cnpj = $tipo_pessoa === 'Física' ? $faker->cpf : $faker->cnpj;

            Cliente::create([
                'nome_completo' => $faker->name,
                'data_nascimento' => $faker->date,
                'tipo_pessoa' => $tipo_pessoa,
                'cpf_cnpj' => $cpf_cnpj,
                'email' => $faker->unique()->safeEmail,
                'endereco' => $faker->address,
                'cep' => $faker->postcode,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
            ]);
        }
    }
}
