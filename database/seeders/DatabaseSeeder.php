<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Para que esto se ejecute, una vez editado, hay que ejecutar el comando:
        php artisan migrate:refresh --seed.

        NOTA: El dato semilla se genera gracias a que primero existe un Factory
        */
        \App\Models\User::factory()->create();
        \App\Models\Post::factory(80)->create();
    }
}
