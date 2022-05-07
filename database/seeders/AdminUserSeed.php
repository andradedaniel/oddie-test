<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            "name"     => "Oddie Admin",
            "email"    => "admin@oddie.com",
            "password" => Hash::make("1234"),
            "is_admin" => true,
        ]);
    }
}
