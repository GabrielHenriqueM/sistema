<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_completo' => $this->faker->name(),
            'estado_civil' => $this->faker->randomElement(['solteiro', 'casado', 'divorciado', 'viuvo']),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'genero' => $this->faker->randomElement(['masculino', 'feminino']),
            'faixa_preco' => $this->faker->randomFloat(2, 100000, 1000000),
            'tipo_imovel_interesse' => $this->faker->randomElement(['casa', 'apartamento', 'terreno']),
        ];
    }
}
