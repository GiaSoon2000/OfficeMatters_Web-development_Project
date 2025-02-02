<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin123@gmail.com';
        $admin->password = bcrypt('admin12345');
        $admin->is_admin = true; // Set as admin user
        $admin->save();
    }
}
