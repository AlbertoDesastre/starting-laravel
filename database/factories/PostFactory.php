<?php

namespace Database\Factories;

/* Esto es una Clase para transformar texto en URL amigables */
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* 
        Esto es una fábrica de datos falsos. Accedo a las 
        propiedades de la tabla en DB, y luego al faker para que cree
        cositas. 
        Para que esto funcione hay que editar el "DatabaseSeeder.php",
        para habilitar la creación de datos falsos.
        */
        return [
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title),
            'body' => $this->faker->text(2200),
        ];
    }
}
