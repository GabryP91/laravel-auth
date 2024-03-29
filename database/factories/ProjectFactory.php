<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome_autore'=>fake()->name($gender = null),
            'titolo_progetto'=>fake()->company,
            'img_riferimento'=>fake()->imageUrl(640, 480, 'projects', true),
            'descrizione'=>fake()->paragraph(),
            'data_pubblicazione'=>fake()->dateTimeBetween(),
        ];
    }
}
