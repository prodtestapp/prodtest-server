<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory(1)->create([
            'email' => 'orcun@itsmoneo.com',
            'password' => bcrypt('orcun123'),
        ]);

        User::factory(1)->create([
            'email' => 'ahmet@itsmoneo.com',
            'password' => bcrypt('ahmet123'),
        ]);

        User::factory(1)->create([
            'email' => 'teknasyon@teknasyon.com',
            'password' => bcrypt('teknasyon123'),
        ]);
    }
}
