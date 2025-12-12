<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class NavbarTranslationSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['key' => 'home', 'fr' => 'Accueil', 'en' => 'Home', 'ru' => 'Главная'],
            ['key' => 'courses', 'fr' => 'Cours', 'en' => 'Courses', 'ru' => 'Курсы'],
            ['key' => 'services', 'fr' => 'Services', 'en' => 'Services', 'ru' => 'Услуги'],
            ['key' => 'resources', 'fr' => 'Ressources', 'en' => 'Resources', 'ru' => 'Ресурсы'],
            ['key' => 'about', 'fr' => 'À propos', 'en' => 'About', 'ru' => 'О нас'],
        ];

        foreach ($items as $item) {
            foreach (['fr', 'en', 'ru'] as $locale) {
                Translation::updateOrCreate(
                    ['group' => 'navbar', 'key' => $item['key'], 'locale' => $locale],
                    ['value' => $item[$locale]]
                );
            }
        }
    }
}
