<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Casa>
 */
class CasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rua' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'cep' => $this->faker->postcode(),
            'quantidade_quartos' => $this->faker->numberBetween(1, 10),
            'area_de_lazer' => $this->faker->word(),
            'quantidade_banheiros' => $this->faker->numberBetween(1, 5),
            'garagem' => $this->faker->numberBetween(1, 3),
            'area_total' => $this->faker->randomFloat(2, 50, 500),
            'preco_imovel' => $this->faker->randomFloat(2, 100000, 1000000),
            'status' => $this->faker->randomElement(['disponível', 'vendido']),
        ];
    }
}
