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
            'estado' => $this->faker->state(),
            'cep' => $this->faker->postcode(),
            'area_total' => $this->faker->randomFloat(2, 50, 500),
            'valor_loteamento' => $this->faker->randomFloat(2, 50000, 500000),
            'observacoes' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['disponivel', 'vendido']), 
        ];
    }
}
