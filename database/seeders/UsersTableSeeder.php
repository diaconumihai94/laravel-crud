<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => '$2y$10$X7Ekmdqoke6b5RpCQ7fCuO8kMzorZEACm1QL6sXc2u.iTTxYAafqW',
        ]);
    }
}
