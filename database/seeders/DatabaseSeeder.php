<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Сидер администратора
        $this->call(AdminSeeder::class);

        // Сидер переводов главной страницы
        $this->call(HomePageTranslationSeeder::class);
    }
}
