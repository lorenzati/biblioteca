<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "titulo" => $this->faker->word(),
            "descripcion" => $this->faker->paragraph(),
            "cantidad_paginas" => $this->faker->randomDigit(),
            "autor" => $this->faker->name(),
            "editorial" => $this->faker->word(),
            "fecha_publicacion" => $this->faker->date(),
            "activa" => 1,
        ];
    }
}