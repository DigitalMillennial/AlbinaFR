<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
       Admin::create([
    'name' => 'Albina',
    'email' => 'albina@francais.com',
    'password' => Hash::make('123456789Albina'),
]);

    }
}
