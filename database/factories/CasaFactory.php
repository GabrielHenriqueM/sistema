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
     */
    public function definition(): array
    {
        return [
            'rua' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'cep' => $this->faker->postcode(),
            'quantidade_quartos' => $this->faker->numberBetween(1, 10),
            'area_de_lazer' => $this->faker->randomElement(['Piscina', 'Churrasqueira', 'Academia']),
            'quantidade_banheiros' => $this->faker->numberBetween(1, 5),
            'garagem' => $this->faker->numberBetween(0, 4),
            'area_total' => $this->faker->randomFloat(2, 60, 800),
            'preco_imovel' => $this->faker->randomFloat(2, 300000, 5000000),
            'status' => $this->faker->randomElement(['disponivel', 'vendido']),
        ];
    }
}
