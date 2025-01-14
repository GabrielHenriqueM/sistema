<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartamento>
 */
class ApartamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'bloco_predio' => $this->faker->randomElement(['Bloco A', 'Bloco B', 'Bloco C']),
            'numero_apartamento' => $this->faker->numberBetween(101, 999),
            'andar' => $this->faker->numberBetween(1, 20),
            'rua' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'cep' => $this->faker->postcode(),
            'quantidade_quartos' => $this->faker->numberBetween(1, 4),
            'quantidade_banheiros' => $this->faker->numberBetween(1, 3),
            'quantidade_vagas_garagem' => $this->faker->numberBetween(0, 3),
            'varanda_sacada' => $this->faker->randomElement(['Sim', 'Não']),
            'area_lazer_condominio' => $this->faker->sentence(),
            'moveis_planejados' => $this->faker->sentence(),
            'area_total' => $this->faker->randomFloat(2, 50, 150),
            'preco_imovel' => $this->faker->randomFloat(2, 200000, 1000000),
            'valor_condominio' => $this->faker->randomFloat(2, 200, 1500),
            'status' => $this->faker->randomElement(['disponivel', 'vendido']),
        ];
    }
}