<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Установка языка до загрузки представлений
        $this->app->beforeResolving('view', function () {
            $locale = Session::get('locale', 'fr');
            App::setLocale($locale);
        });
    }

    public function boot(): void
    {
        // Логирование SQL-запросов (оставляем как было)
        DB::listen(function ($query) {
            logger('SQL: ' . $query->sql);
            logger('Bindings: ' . implode(', ', $query->bindings));
        });
    }
}
