<?php

namespace Database\Seeders;

use App\Models\testing;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         User::factory(10)->create();
         // Add Admin
         User::insert([
             'email' => 'admin@admin.com',
             'name' => 'admin',
             'password' => 'admin',
             'created_at' => date('Y-m-d H:i:s')]);

         testing::factory(4)->create();
    }
}
