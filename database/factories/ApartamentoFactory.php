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
            'estado' => $this->faker->stateAbbr(),  // Ajuste para usar sigla do estado
            'cep' => $this->faker->postcode(),
            'quantidade_quartos' => $this->faker->numberBetween(1, 5),
            'quantidade_banheiros' => $this->faker->numberBetween(1, 4),
            'quantidade_vagas_garagem' => $this->faker->numberBetween(0, 4),
            'varanda_sacada' => $this->faker->randomElement(['Sim', 'Não']),
            'area_lazer_condominio' => $this->faker->randomElement(['Piscina', 'Academia', 'Churrasqueira', 'Salão de Festas']),
            'moveis_planejados' => $this->faker->randomElement(['Cozinha Completa', 'Quartos Planejados', 'Nenhum']),
            'area_total' => $this->faker->randomFloat(2, 60, 500),  // Área total maior
            'preco_imovel' => $this->faker->randomFloat(2, 500000, 5000000),  // Valor maior para imóveis de luxo
            'valor_condominio' => $this->faker->randomFloat(2, 300, 3000),  // Valor de condomínio mais alto
            'status' => $this->faker->randomElement(['disponivel', 'vendido']),
        ];
    }
}
