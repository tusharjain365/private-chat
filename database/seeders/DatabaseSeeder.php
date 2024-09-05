<?php

use Illuminate\Database\Seeder;
use App\Models\User; // Make sure to use the correct namespace for the User model

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        User::factory()->create([
            'email' => 'sarthak@gmail.com',
            'name' => 'Sarthak',
        ]);

        User::factory()->create([
            'email' => 'bitfumes@gmail.com',
            'name' => 'Bitfumes',
        ]);

        User::factory()->create([
            'email' => 'ankur@gmail.com',
            'name' => 'Ankur',
        ]);
    }
}
