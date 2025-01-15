<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lote>
 */
class LoteFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'numero_lote' => $this->faker->unique()->numberBetween(1, 500),
            'rua' => $this->faker->streetName(),
            'bairro' => $this->faker->word(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(), // Sigla do estado
            'cep' => $this->faker->postcode(),
            'area_total' => $this->faker->randomFloat(2, 200, 1000), // Área maior
            'valor_loteamento' => $this->faker->randomFloat(2, 100000, 5000000), // Valor maior
            'observacoes' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['disponivel', 'vendido']),
        ];
    }
}
