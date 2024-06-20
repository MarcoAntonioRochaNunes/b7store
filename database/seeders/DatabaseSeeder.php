<?php

namespace Database\Seeders;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StateSeeder::class);

        User::factory()->create([
            'name' => 'Teste Usere',
            'email' => 'teste@teste.com',
            'password' => 123456,
        ]);
    }
}
