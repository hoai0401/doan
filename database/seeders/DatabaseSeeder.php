<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::find(1)->update(['is_admin'=>true]);
        // // // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'user',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class
        ]);
    }
}
