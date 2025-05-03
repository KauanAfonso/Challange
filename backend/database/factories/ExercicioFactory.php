<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercicio>
 */
class ExercicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(), // Gera uma palavra aleatória para o nome do exercício
            'imagem' => $this->faker->imageUrl(), // Gera uma URL de imagem aleatória
            'descricao' => $this->faker->sentence(), // Gera uma frase al
        ];
    }
}
